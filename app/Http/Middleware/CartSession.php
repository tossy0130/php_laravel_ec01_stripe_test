<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// ===読み込み
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // === return $next($request) の前に記述することで、画面が生成される前に
        // しょりを行う
        if (!Session::has('cart')) {
            $cart = Cart::create();
            Session::put('cart', $cart->id);
        }

        return $next($request);
    }
}
