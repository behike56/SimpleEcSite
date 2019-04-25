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
        @include('cart.header')
        <div class="container">
	          <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10%">商品名</th>
                            <th width="20%">詳細</th>
                            <th width="5%">個数</th>
                            <th width="5%">価格</th>
                            <th width="5%">変更</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<$countBox; $i++)
                            <tr>
                                <td>{{ $carts[$i]['name'] }}</td>
                                <td>{{ $carts[$i]['desc'] }}</td>
                                <td>{{ $carts[$i]['qtity'] }}</td>
                                <td>{{ $carts[$i]['price'] }}</td>
                                <td>
                                    <div>
                                        <a href="">削除</a>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
                <div><p>合計個数:{{$totalQty}}個</p></div>
                <div><p>合計価格{{$totalPriceNoTax}}円（税抜き）</p></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        @include('cart.footer')
    </body>
</html>
