<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>発送方法の選択</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
    </head>
    <body>
        @include('payment.header')
        <form action="{{ action('Paymnet\PaymentController@addOrders') }}" method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
	              <div class="panel-heading">
		                発送先の住所を選んでください
	              </div>
	              <div class="panel-body">
                    <p>住所１</p>
                    {{ $PHP_EOL  }}
                    <input type="radio" name="address1" value="{{$customer->address1}}" checked>{{$customer->address1}}
                    <p>住所２</p>
                    <input type="radio" name="address2" value="{{$customer->address2}}">{{$customer->address1}}
	              </div>
            </div>
            <div class="panel panel-default">
	              <div class="panel-heading">
		                発送方法を選んでください
	              </div>
	              <div class="panel-body">
		                <p>クロネコヤマト</p>
                    {{ $PHP_EOL  }}
                    <input type="radio" name="address1" value="kuroneko" checked>クロネコヤマト:送料６個毎に300円
                    <p>佐川急便</p>
                    <input type="radio" name="address2" value="sagawa">佐川急便:送料６個毎に300円
	              </div>
            </div>
        </form>
        <div style="float:right">
            <button class="btn btn-default">
                {{-- <a href="{{ action('Payment\PaymentController@shipping') }}"> --}}
                支払い方法の選択へ
                {{-- </a> --}}
            </button>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @include('payment.footer')
    </body>
</html>
