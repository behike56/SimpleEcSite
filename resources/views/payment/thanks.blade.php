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
        <p>ご購入ありがとうございます。</p>
        <p>ご注文内容をメールで送りました。</p>
        <p>ご確認ください。</p>
        <p><a href="{{url('sample/mailable/preview')}}">メール送信確認</a></p>
        <div style="float:right">
            <button class="btn btn-default">
                <a href="{{ url('/') }}">
                    トップページへ戻る
                </a>
            </button>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @include('payment.footer')
    </body>
</html>
