
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
	 .cart-info {
	     padding: 0.5em 1em;
	     margin: 2em 0;
	     background: #f0f7ff;
	     border: dashed 2px #5b8bd0;/*点線*/
	 }
	 .cart-info p {
	     margin: 0; 
	     padding: 0;
	 }
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
			    <li><a href="#">menuA</a></li>
			    <li><a href="#">menuB</a></li>
			    <li><a href="#">menuC</a></li>
			</ul>
		    </div>

		    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-right  ml-auto">
			<li>
			    <!-- Authentication Links -->
			    <p>ログイン</p>
			</li>
			<li>
			    <div class="cart-info">
				<h2>カート：個数＆金額</h2>
			    </div>
			</li>
                    </ul>
		</div>
	    </nav>
	</div>
    </body>
</html>



