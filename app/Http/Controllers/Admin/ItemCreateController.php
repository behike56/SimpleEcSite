<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use Carbon\Carbon;

class ItemCreateController extends Controller
{

    /**
     * 商品追加ページ
     * @return ('admin.create')
     **/
    public function add()
    {
        return view('admin.create');
    }

    /**
     * 商品データ作成、保存
     * @param Request $request
     * @var array $items 商品情報テーブルインスタンス
     * @var array $form $requestを含む
     * @var time $imageNow 画像の名前をユニークにするために名前の先頭につける
     * @var string $path 拡張子を含むファイル名
     * @var string $trueName テーブルに保存されるファイル名
     * @return redirect('/')
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

        return redirect('admin', ['']);
    }

    /**
     * 追加した商品一覧ページ
     * @param Request $request
     * @var array $form 商品情報
     * @return view('admin.list')
     * @return array $form
     * @table items
     **/
    public function index(Request $request)
    {
        $form = Items::all();
        return view('admin.list', ['form' => $form]);
    }
}
