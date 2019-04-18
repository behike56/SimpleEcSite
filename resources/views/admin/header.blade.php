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

	    <a class="btn btn-default header-title" href="#" role="button">
		<h2 class="header-title">商品の追加と編集</h2>
	    </a>
	</div>
	
	<div class="collapse navbar-collapse" id="navbarEexample2">
	    <ul class="nav navbar-nav">
		<li><a href="{{url('/admin')}}">一覧</a></li>
		<li><a href="{{url('/admin/create')}}">追加</a></li>
		<li><a href="{{url('/')}}">ユーザーサイトTOP</a></li>
	    </ul>
	</div>
    </div>
</nav>
