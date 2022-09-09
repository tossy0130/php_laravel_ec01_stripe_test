<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    // 
    //=== 商品画像　一覧画面
    public function index()
    {
        return view('product.index')
            ->with('products', Product::Paginate(6)); // === ページネーション
        //    ->with('products', Product::get());
    }

    //=== 商品詳細　画面
    public function show($id)
    {
        return view('product.show')
            ->with('product', Product::find($id));
    }
}
