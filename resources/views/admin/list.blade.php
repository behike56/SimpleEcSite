@extends('admin.index')
@section('title', '商品一覧')

@section('content')
    <div class="container">
        <div class="row">
	    <h2>商品一覧</h2>
	</div>
	<div class="row">
	    <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="10%">名前</th>
                                <th width="10%">時期</th>
                                <th width="10%">高さ</th>
                                <th width="35%">詳細</th>
                                <th width="20%">画像</th>
                                <th width="5%">在庫</th>
                                <th width="5%">価格</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($form as $infos)
                                <tr>
                                    <td>{{ $infos->id }}</td>
                                    <td>{{ str_limit($infos->items_name, 20) }}</td>
                                    <td>{{ $infos->flowering_time }}</td>
                                    <td>{{ $infos->full_length }}</td>
                                    <td>{{ str_limit($infos->descriptions, 100) }}</td>
                                    <td>{{ $infos->items_image }}</td><td>{{ $infos->stock }}</td>
                                    <td>{{ $infos->price }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ItemCreateController@edit', ['id' => $infos->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\ItemCreateController@delete', ['id' => $infos->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
