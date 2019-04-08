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

	    <!-- main -->
	    <div class="col-md-9">
		<!-- apply custom style -->
		<div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
		    <h1><small>タイトル</small></h1>
		</div>
		
		<form class="form-horizontal">
		    <div class="form-group">
			<label for="name1" class="col-md-3 control-label">お名前</label>
			<div class="col-sm-9"><input type="text" class="form-control" id="name1"></div>
		    </div>
		    <div class="form-group">
			<label for="mail1" class="col-md-3 control-label">メールアドレス</label>
			<div class="col-sm-9"><input type="email" class="form-control" id="mail1"></div>
		    </div>
		    <div class="form-group">
			<label for="ask1" class="col-md-3 control-label">お問い合わせ内容</label>
			<div class="col-md-9"><textarea rows="5" class="form-control" id="ask1"></textarea></div>
		    </div>
		    
		    <div class="col-md-offset-3 text-center"><button class="btn btn-primary">送信</button></div>
		</form>
		
	    </div>

	</div> <!-- /container -->
    </body>
</html>




