<?php

use Illuminate\Support\Facades\Route;

//=== コントローラーの読み込み
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LineItemController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
Route::get('/', function () {
    return view('welcome');
});
*/

//=== 商品一覧　、　詳細画面
Route::group(['prefix' => 'product'], function () {
    // === 一覧画面
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    // 詳細画面
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
});

//=== カートない　追加 post
Route::group(['prefix' => 'line_item'], function () {
    // カートへ入れる
    Route::post('/line_item/create', [LineItemController::class, 'create'])->name('line_item.create');
    // カートから削除処理
    Route::post('/line_item/delete', [LineItemController::class, 'delete'])->name('line_item.delete');
});

//=== カート内 一覧表示
Route::group(['prefix' => 'cart'], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // 決算
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    // 
    Route::get('/cart/success', [CartController::class, 'success'])->name('cart.success');
});
