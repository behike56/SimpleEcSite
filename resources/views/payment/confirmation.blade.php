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
                            <th width="10%">商品名</th>
                            <th width="5%">個数</th>
                            <th width="5%">単価</th>
                            <th width="5%">金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<$countBox; $i++)
                            <tr>
                                <td>{{ $carts[$i]['name'] }}</td>
                                <td>{{ $carts[$i]['qtity'] }}</td>
                                <td>{{ $carts[$i]['price'] }}</td>
                            </tr>
                        @endfor
                        <tr>
                            <td>消費税：¥{{$totalTaxes}}</td>
                        </tr>
                        <tr>
                            <td>{{$kuroneko}}</td>
                            <td>送料：¥{{ $shipping  }}</td>
                        </tr>
                        <tr><td>合計金額：¥{{$totalPrice}}</td></tr>
                    </tbody>
                </table>

                <div class="panel panel-default">
	                  <div class="panel-heading">
		                    発送と支払い
	                  </div>
	                  <div class="panel-body">
		                    <p>発送先住所</p>

                        <p>発送方法</p>
                        <p>支払い方法</p>
	                  </div>
	                  <div class="panel-footer">
                            {{-- <a href="{{ action('Payment\PaymentController@shipping') }}"> --}}
                            注文を取りやめる（カートの中身と選択された全てが取り消されます）
                            {{-- </a> --}}
	                  </div>
                </div>
                <div style="float:right">
                    <button class="btn btn-default">
                        {{-- <a href="{{ action('Payment\PaymentController@orderExcution') }}"> --}}
                        ご注文を確定する
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
