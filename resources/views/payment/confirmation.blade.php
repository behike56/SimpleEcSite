<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>注文確認ページ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
    </head>
    <body>
        @include('payment.header')
        <div class="container">
	          <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10%" style="text-align: center">商品名</th>
                            <th width="5%" style="text-align: center">個数</th>
                            <th width="5%" style="text-align: center">単価</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<$countBox; $i++)
                            <tr>
                                <td style="text-align: center">{{ $carts[$i]['name'] }}</td>
                                <td style="text-align: right">{{ $carts[$i]['qtity'] }}</td>
                                <td style="text-align: right">{{ $carts[$i]['price'] }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
                <table class="table">
                    <tr>
                        <td style="text-align: right">小計：¥{{$totalPriceNoTax}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right">消費税：¥{{intval($tax)}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right">送料：¥{{$shippingFee}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right">合計金額：¥{{intval($totalPriceNoTax+$tax+$shippingFee)}}</td>
                    </tr>
                </table>
                <div class="panel panel-default">
	                  <div class="panel-heading">
		                    発送と支払い
	                  </div>
	                  <div class="panel-body">
		                    <p>発送先住所:   {{$address}}</p>
                        <p>発送方法:  {{$shipping}}</p>
                        <p>支払い方法:   {{$payMethod}}</p>
	                  </div>
	                  <div class="panel-footer">
                            <a href="{{ action('Payment\PaymentController@resetOrder') }}">
                            注文を取りやめる（配送と支払いの選択をキャンセルし、カートページに戻ります。）
                            </a>
	                  </div>
                </div>
                <div style="float:right">
                    <button class="btn btn-default">
                        <a href="{{ action('Payment\PaymentController@orderExcution') }}">
                        ご注文を確定する
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @include('payment.footer')
    </body>
</html>
