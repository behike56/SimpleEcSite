<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カートの中身</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
    </head>
    <body>
        @include('cart.header')
        <div class="container">
	          <div class="col-md-10">
                カートは空です。
                トップページへ戻ってください。
            </div> 
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @include('cart.footer')
    </body>
</html>
