<p>決済ページへリダイレクトします。</p>
<!-- stripe 読み込み -->
<script src="https://js.stripe.com/v3/"></script>

<!-- 決算処理 -->
<script>

  
    // === stripeオブジェクトの作成
    const publicKey = '{{ $publicKey }}';
    const stripe = Stripe(publicKey);
    window.onload = function() {
        stripe.redirectToCheckout({
            sessionId: '{{ $session->id }}'
        // === エラー処理 ===
        }).then(function (result) {
            window.location.href = 'http://localhost/cart';
        });
    }
</script>