@extends('layouts.app')

@section('title')
カート
@endsection

@section('content')

<div class="container">
    <div class="cart__title">
        カート内
    </div>

    <!-- ======= 合計金額　カウント用 ====== -->
    <?php $t = []; ?>
    <?php $idx = 0; ?>

    <!-- ========= カートに入れたアイテムが 0以上 ========= -->
    @if(count($line_items) > 0)
    <div class="cart-wrapper">
        @foreach($line_items as $item)
             <div class="card mb-3">
            <div class="row" style="height: 180px;overflow: hidden;">
                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="product-cart-img"
                style="position: relative;top: 0%;height: 180%;width: 23%;"/>
                <div class="card-body">
                    <div class="card-product-name col-6">
                        {{ $item->name }}
                    </div>
                    <div class="card-quantity col-2">
                        {{ $item->pivot->quantity }}個
                    </div>

                    <div class="card__total-price col-3 text-center">
                        <!-- 「アイテム数」 ×　「個数」 -->
                        ￥{{ number_format($item->price * $item->pivot->quantity) }}
                        
                        <!-- ====== 合計金額　カウント用 ====== -->
                        <?php $t[$idx] = $item->price * $item->pivot->quantity; ?>
                    </div>
                    
                    <!-- 購入ボタン　設置 -->
                    <button onClick="location.href='{{ route('cart.checkout') }}'" class="cart__purchase btn btn-primary">
                         購入する
                    </button>

                    <!-- ====== カート内からの削除処理 ====== -->
                    <form action="{{ route('line_item.delete') }}" method="POST">
                        @csrf
                        <div class="card__btn-trash col-1">
                            <input type="hidden" name="id" value="{{ $item->pivot->id }}">
                            <button type="submit" class="fas fa-trash-alt btn"></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <?php $idx += 1; ?>
        @endforeach

        <p style="font-size:18px;"><strong>合計金額：{{ number_format(array_sum($t)) }}円</strong></strong>
        
    <!-- ========= カートが空の場合  ========= -->
    @else
      <div class="cart__empty">
        カートに商品が入っていません。
    </div>
        
    @endif

</div>
@endsection