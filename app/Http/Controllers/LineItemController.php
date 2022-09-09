<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session; // ファサード session
use App\Models\LineItem; // Model LineItme

class LineItemController extends Controller
{
    //
    public function create(Request $request)
    {
        // === カート ID の　セッション情報を取得
        $cart_id = Session::get('cart');
        $line_item = LineItem::where('cart_id', $cart_id) // カートID と、フォームで送られてきた
            ->where('product_id', $request->input('id')) // id で 情報を取得。
            ->first();

        // カート情報があった場合、フォームで選択された「個数」を加算して保存。
        if ($line_item) {
            $line_item->quantity += $request->input('quantity');
            $line_item->save();
        } else {
            // カート情報がない場合は　（１商品目）作成して保存
            LineItem::create([
                'cart_id' => $cart_id,
                'product_id' => $request->input('id'),
                'quantity' => $request->input('quantity'),
            ]);
        }

        // カートへリダイレクト
        return redirect(route('cart.index'));
    }

    // ====== カート内から削除
    public function delete(Request $request)
    {
        //=== POST された id を取得して、削除しょり　=> destroy
        LineItem::destroy($request->input('id'));

        return redirect(route('cart.index'));
    }
}
