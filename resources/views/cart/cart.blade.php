<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カートの中身</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="row">
	          <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">商品名</th>
                                <th width="60%">詳細</th>
                                <th width="10%">個数</th>
                                <th width="10%">価格</th>
                                <th width="10%">変更</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                   use App\Items;
                                   @endphp --}}
                            @foreach($carts as $cart)
                                <tr>
                                    <td>{{ $cart -> name }}</td>
                                    <td>{{ $cart -> desc }}</td>
                                    <td>{{ $cart -> qtity }}</td>
                                    <td>{{ $cart -> price }}</td>
                                    <td>

                                        <div>
                                            <a href="{{ action('Cart\CartController@delete', ['id' => $cart -> cartId]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div><p>合計個数</p></div>
                    <div><p>合計価格（税抜き）</p></div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>
