<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ページタイトル</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default" style="background-color: #FFFFFF;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar">a</span>
                            <span class="icon-bar">b</span>
                            <span class="icon-bar">c</span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <h1>Simple Garden</h1>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarEexample2">
                        <ul class="nav navbar-nav">
                            <li><a href="#">menuA</a></li>
                            <li><a href="#">menuB</a></li>
                            <li><a href="#">menuC</a></li>
                        </ul>
                    </div>

                    <div style="float:right;">
                        <p>ログイン</p>
                        <div class="panel panel-success" style="width:150px">
	                          <div class="panel-heading">
                                <a href="{{ url('/displayCart') }}">
		                                買い物カゴ
                                </a>
	                          </div>
	                          <div class="panel-body">
                                <button type="button" class="btn btn-primary btn-lg btn-block active">
                                    <a href="{{ action('Cart\CartController@resetCart') }}">
                                        RESET
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>


