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
        <div class="container">
            <div class="row">
                <form action="{{ url('/settlement') }}" method="POST" enctype="multipart/form-data">
                    <div class="panel panel-default">
	                      <div class="panel-heading">
		                        発送先の住所を選んでください
	                      </div>
	                      <div class="panel-body">
                            <p><input type="radio" name="address" value="{{$users->address}}">    登録された住所: {{$users->address}}</p>
                            <p><input type="radio" name="address" value="OTHER">
                                そのほかの住所を入力:</p>
                            <textarea name="addressTwo" rows="2" cols="40"></textarea>
	                      </div>
                    </div>
                    <div class="panel panel-default">
	                      <div class="panel-heading">
		                        発送方法を選んでください
	                      </div>
	                      <div class="panel-body">
		                        <p> <input type="radio" name="shipping" value="kuroneko">    クロネコヤマト:送料６個毎に300円</p>
                            <p> <input type="radio" name="shipping" value="sagawa">    佐川急便:送料６個毎に300円</p>
	                      </div>
                    </div>
                    <div style="float:right">
                        <input type="submit" value="発送方法を決定する">
                    </div>
                    {{ csrf_field() }}
                </form>
                {{-- <button class="btn btn-default">
                <a href="{{ action('Payment\PaymentController@toSettlement') }}">
                支払い方法を選択する。
                </a>
                </button> --}}
                <button type="button" class="btn btn-primary btn-lg btn-block active">
                    <a href="{{ action('Payment\PaymentController@resetShipping') }}">
                        SHIPPING RESET
                    </a>
                </button>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @include('payment.footer')
    </body>
</html>
