@extends('items.items')
@section('title', '商品一覧')

@section('content')
    <div class="col-md-12">
        <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
            <h1><small>商品一覧</small></h1>
        </div>
        <div class="row">
            @foreach($form as $infos)
                <div class="col-xs-10 col-md-4">
                    <div class="thumbnail" style="text-align:center; padding-top:10px; padding-bottom: 10px;">
                        <a href="{{ action('Items\ItemsController@detail', ['id' => $infos->id]) }}">
                            <img src="{{ asset('storage/image/' . $infos->items_image) }}" style="width:250px; height:150px;">
                        </a>
                        <div class="caption">
                            <p><b>{{ str_limit($infos->items_name, 20) }}</b></p>
                            <p>開花時期：{{ str_limit($infos->flowering_time, 20) }}</p>
                            <p>全長：{{ $infos->full_length }}</p><p>在庫：{{ $infos->stock }}</p>
                            <p>価格：{{ $infos->price }}</p>
                            <p style="margin-bottom:0px">
                                <a href="" class="btn btn-primary">カートに追加</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
