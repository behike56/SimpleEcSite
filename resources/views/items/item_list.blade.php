@extends('layouts.layout')
@section('title', 'Tutrial for beginner')
@section('content')
    <!-- main -->
    <div class="col-md-9">
	<!-- apply custom style -->
	<div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
	    <h1><small>タイトル</small></h1>
	</div>
	
	<div class="row">
	    
	    <!-- この単位を繰り返す -->
	    <div class="col-md-4">
		<div class="thumbnail" style="text-align:center;padding-top:10px;">
		    <a href="">
			<img src="150x150.jpg">
		    </a>
		    <div class="caption">
			<p><b>Caption</b></p>
			<p>this is a caption.</p>
			<p style="margin-bottom:0px"><a href="" class="btn btn-primary">to cart</a></p>
		    </div>
		</div>
	    </div>
	<!-- ここまで -->
	
	：（以下、繰り返し）
	
    </div><!-- end row -->
    </div><!-- end main -->
    @endsection
