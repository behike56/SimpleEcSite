<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Items;


class ItemCreateController extends Controller
{
    /**
     * 商品追加ページ
     * @return string view-file name
     **/
    public function add()
    {
        return view('admin.create');
    }

    /**
     * 商品データ作成、保存
     * 商品情報を商品テーブルへ保存する
     * 画像のファイル名は同名ファイルを入力されても保存
     * できるようにするため画像ファイル名の先頭に日付日時を付加する。
     * @param Request $request
     * @var array string $form
     * @var array $items
     * @var string Carbon $imageNow
     * @var string $path
     * @var string $trueName
     * @return string redirect('/')
     * @table items
     **/
    public function create(Request $request)
    {
        $this->validate($request, Items::$rules);

        $items = new Items;
        $form = $request->all();
        $imageNow = Carbon::now();

        if (isset($form['items_image'])) {
            $path = $request->file('items_image')->getClientOriginalName();
            $trueName = $imageNow->format('Y-m-d_H:i:s').$path;
            $request->file('items_image')->storeAs('public/image/', $trueName);

        } else {
            $items->items_image = null;
        }

        unset($form['_token']);
        $items->timestamps = false;

        $items->fill([
            'items_name' => $form['items_name'],
            'items_image' => $trueName,
            'flowering_time' => $form['flowering_time'],
            'full_length' => $form['full_length'],
            'descriptions' => $form['descriptions'],
            'stock' => $form['stock'],
            'price' => $form['price']
        ]);

        $items->save();

        return redirect('admin')->with(['']);
    }

    /**
     * 追加した商品一覧ページ
     * @var array $form
     * @return string view('admin.list')
     * @return array $form
     * @table items
     **/
    public function index()
    {
        $form = Items::all();
        return view('admin.list')->with(['form' => $form]);
    }
}

