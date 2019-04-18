@extends('items.items')
@section('title', '商品詳細')

@section('content')
    <div class="container-fluid">
	<div class="row">
	    <div class="col-md-6">
		<img src="{{ asset('storage/image/' . $form->items_image) }}" class="img-rounded" width="100%" height="100%">
			  </div>
			  <div class="col-md-6">
		<table class="table table-striped">
		    <thead>
			<tr>
			    <th width="100px">商品詳細</th>
			</tr>
		    </thead>
		    <tr>
			<td>商品名</td>
			<td>{{ $form->items_name }}</td>
		    </tr>
		    <tr>
			<td>開花時期</td>
			<td>{{ $form->flowering_time }}</td>
		    </tr>
		    <tr>
			<td>最大の全長</td>
			<td>{{ $form->full_length }}</td>
		    </tr>
		    <tr>
			<td>詳細</td>
			<td>{{ $form->descriptions }}</td>
		    </tr>
		</table>
		<div class="well well-lg">
		    <p>在庫：{{ $form->stock }}</p>
		    <p>価格：{{ $form->price }}</p>
		    <form class="form-inline">
			<div class="form-group">
			    <label class="sr-only" for="InputEmail">金額</label>
			    <div class="input-group">
				<span class="input-group-addon">個数</span>
				<input type="text" class="form-control">
				<span class="input-group-addon">個</span>
			    </div>
			</div>
			<button type="submit" class="btn btn-default">カートに入れる</button>
		    </form>
			
		</div>
	    </div>
	</div>
    </div>
@endsection
