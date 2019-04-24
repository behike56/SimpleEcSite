<?php
session_start();
?>
<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
        <!-- 独自CSS＆JS -->
        <link href="css/form.css" rel="stylesheet" type="text/css">
        <script src="js/onlyNumber.js" type="text/javascript"></script>
    </head>
    <body>
        @include('items.header')
        <div class="container">
            <div class="row" id="content">
                <div class="col-md-2">
                    @include('items.sidebar')
                </div>
                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('items.footer')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>
