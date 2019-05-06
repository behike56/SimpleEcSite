<?php
namespace App\Http\Controllers\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Items;

class ItemsController extends Controller
{
    /**
     * トップページ兼商品一覧ページ
     * 商品テーブルの全レコード(配列)を取得し
     * viewファイルへformキーで渡す
     * @param mixed $request
     * @var array $form
     * @return string view-file name
     * @return array $form
     * @table items
     **/
    public function itemList(Request $request)
    {
        $form = Items::all();
        return view('items.item_list')->with(['form' => $form]);
    }

    /**
     * 商品詳細ページ
     * リクエストから商品idを受け取り
     * idに一致する商品レコードを$formへ格納する
     * @param mixed $request
     * @var array $form 
     * @return string view-file name
     * @return array $form
     * @table items
     **/
    public function detail(Request $request)
    {
        $form = Items::find($request->id);
        return view('items.details')->with(['form' => $form]);
    }

    /**
     * 資材ページ
     * 追加予定機能
     * @param mixed $request
     * @return string view-file name
     **/
    public function materialList(Request $request)
    {
        return view('items.material_list');
    }
}

