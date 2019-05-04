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
                    <form action="{{ action('Payment\PaymentController@addSettlement') }}" method="post" enctype="multipart/form-data">
	                      <div class="panel-heading">
		                        支払い方法の選択
	                      </div>
	                      <div class="panel-body">
                            <input type="radio" name="payMethod" value="tyakubarai">着払い
                            <input type="radio" name="payMethod" value="konbini-siharai">コンビニ支払い
                            <input type="radio" name="payMethod" value="credit-card">クレジットカード支払い
	                      </div>
                        <div style="float:right">
                            <input type="submit" value="支払い方法を決定する">
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div style="float:right">
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @include('payment.footer')
    </body>
</html>
