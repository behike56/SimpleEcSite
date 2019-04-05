
<!DOCTYPE html>
<html lang="ja">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ページタイトル</title>

	<!--Bootstrap assets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<!--自作CSS -->
	<style type="text/css">
	 <!--
	 /*ここに調整CSS記述*/

	 -->
	</style>
    </head>

    <body>
	<div class="container">
	    
	    <!-- header & grobal navi -->
	    <nav class="navbar navbar-default" style="background-color: #FFFFFF;">
		<div class="container-fluid">
		    <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample2">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
			    <h1>Simple Garden</h1>
			</a>
		    </div>
		    
		    <div class="collapse navbar-collapse" id="navbarEexample2">
			<ul class="nav navbar-nav">
			    <li class="active"><a href="#">menuA</a></li>

			    <li><a href="#">menuB</a></li>
			    <li><a href="#">menuC</a></li>
			</ul>
		    </div>

		    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
			<div class="cart-info"><h2>カート：個数＆金額</divh2></div>
                        <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
		    
		</div>
	    </nav>
	    
	</div> <!-- /container -->
    </body>
</html>



