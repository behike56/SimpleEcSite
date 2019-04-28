<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>決済ページ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
    </head>
    <body>
        @include('payment.header')
        <div class="container">
	          <div class="col-md-12">
                <div class="panel panel-default">
                    <form action="{{ action('Paymnet\PaymentController@addOrders') }}" method="post" enctype="multipart/form-data">
	                  <div class="panel-heading">
		                    支払い方法の選択
	                  </div>
	                  <div class="panel-body">
                        <input type="radio" name="address1" value="tyakubarai">着払い
                        <input type="radio" name="address2" value="konbini-siharai">コンビニ支払い
                        <input type="radio" name="address2" value="credit-card">クレジットカード支払い
	                  </div>
                    </form>
                </div>
                <div style="float:right">
                    <button class="btn btn-default">
                        {{-- <a href="{{ action('Payment\PaymentController@shipping') }}"> --}}
                        ご注文内容の確認へ
                        {{-- </a> --}}
                    </button>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @include('payment.footer')
    </body>
</html>
