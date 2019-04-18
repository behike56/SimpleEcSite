@extends('admin.index')
@section('title', '商品追加')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>商品追加</h2>
                <form action="{{ action('Admin\ItemCreateController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="items_name">商品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="items_name" value="{{ old('items_name') }}">
                        </div>
                    </div>
		    <div class="form-group row">
                        <label class="col-md-2" for="flowering_time">時期</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="flowering_time" value="{{ old('flowering_time') }}">
                        </div>
                    </div>
		    <div class="form-group row">
                        <label class="col-md-2" for="full_length">全長</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="full_length" value="{{ old('full_length') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="descriptions">本文詳細</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="descriptions" rows="10">{{ old('descriptions') }}</textarea>
                        </div>
                    </div>
		    <div class="form-group row">
                        <label class="col-md-2" for="stock">在庫</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="stock" value="{{ old('stock') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="price">価格</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
		    <div class="form-group row">
                        <label class="col-md-2" for="items_image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" accept="image/*" name="items_image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="追加">
                </form>
            </div>
	</div>
    </div>
@endsection
