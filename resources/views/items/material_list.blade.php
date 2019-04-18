@extends('items.items')
@section('title', '追加予定')

@section('content')
    <div class="col-md-12">
	<div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
	    <h1><small>追加予定</small></h1>
	</div>	
	<div class="row">	    
	    <div class="col-xs-10 col-md-4">
		<div class="thumbnail" style="text-align:center; padding-top:10px; padding-bottom: 10px;">
		    <img src="{{ asset('storage/image/'.'under-construction.jpg')}}" style="width:250px; height:150px;">
		    <div class="caption">
			<p><b>追加予定</b></p>
			<p>在庫：999</p>
			<p>価格：999</p>		    
			<p style="margin-bottom:0px"><a href="" class="btn btn-primary">カートに追加</a></p>
		    </div>
		</div>
	    </div>    
	</div>
    </div>
@endsection
