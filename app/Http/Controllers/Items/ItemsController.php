<?php
namespace App\Http\Controllers\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;

class ItemsController extends Controller
{
    /**
     * トップページ兼商品一覧ページ
     * @param Request $request
     * @var array $form 全商品情報
     * @return view('items.itemlist')
     * @return array $form
     * @table items
     **/
    public function itemList(Request $request)
    {
        $form = Items::all();
        return view('items.item_list', ['form' => $form]);
    }

    /**
     * 商品詳細表示
     * @param Request $request
     * @var array $form 指定されたIDに一致するレコード
     * @return view('items.details')
     * @return array $form IDに一致した商品情報
     * @table items
     **/
    public function detail(Request $request)
    {
        $form = Items::find($request->id);
        return view('items.details',  ['form' => $form]);
    }

    /**
     * 商材ページ
     * 追加予定機能
     * @param Request $request
     * @return view('items.materialList')
     **/
    public function materialList(Request $request)
    {
        return view('items.material_list');
    }
}
