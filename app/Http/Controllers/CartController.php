<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\LineItem;

class CartController extends Controller
{

    //========== カート内一覧　表示 & 「合計金額」計算
    public function index()
    {
        $cart_id = Session::get('cart');
        $cart = Cart::find($cart_id);

        // === 「合計金額」取得
        $total_price = 0;
        foreach ($cart->products as $product) {

            $total_price += $product->price * $product->pivot->quantity;
        }

        return view('cart.index')
            ->with('line_items', $cart->products) // 商品情報
            ->with('total_price', $total_price); // 合計金額

    }


    //========== 決算処理
    public function checkout()
    {
        // === session から、カートID を取得して、紐づいたカート情報を取得
        $cart_id = Session::get('cart');
        $cart = Cart::find($cart_id);

        // === カートの中身が入っていなかったらリダイレクト
        if (count($cart->products) <= 0) {
            return redirect(route('cart.index'));
        }

        $line_items = [];
        foreach ($cart->products as $product) {
            $line_item = [
                'name'        => $product->name,
                'description' => $product->description,
                'amount'      => $product->price,
                'currency'    => 'jpy',
                'quantity'    => $product->pivot->quantity,
            ];
            array_push($line_items, $line_item);
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY')); // === .env キー

        // ================= Stripe のオプションなども設定できる。=================
        // 上記の $line_item で値を取得して、下で 'line_items' オプションの値にセットしている。
        // 
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [$line_items],

            'billing_address_collection' => 'required', // *** 住所入力必須 ***

            'shipping_address_collection' => [ // *** 住所を日本に固定 ***
                'allowed_countries' => ['JP'],
            ],

            //'success_url'          => route('product.index'),
            'success_url' => route('cart.success'),
            'cancel_url'           => route('cart.index'),
        ]);

        return view('cart.checkout', [
            'session' => $session,
            'publicKey' => env('STRIPE_PUBLIC_KEY') // === .env キー
        ]);
    }

    //====== 決算終了後　カート内削除
    public function success()
    {

        $cart_id = Session::get('cart');
        LineItem::where('cart_id', $cart_id)->delete();

        return redirect(route('product.index'));
    }
}
