<?php

namespace App\Http\Controllers\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Items;

class ItemsController extends Controller
{
    /**
     * トップページ＆商品一覧表示
     * @parameter (Request $request)
     * @return ('items.itemlist')
     * @return ['form' => $form]
     **/
    public function itemList(Request $request)
    {
	$form = Items::all();
	return view('items.item_list', ['form' => $form]);
    }

    /**
     * トップページ＆資材一覧表示
     * @parameter (Request $request)
     * @return ('items.materialList')
     * @return ['form' => $form]
     **/
    public function materialList()
    {
	return view('items.material_list');
    }

    /**
     * 商品詳細表示
     * @parameter ()
     * @return ('')
     * @return
     **/
    public function detail(Request $request)
    {
	$form = Items::find($request->id);
	return view('items.details',  ['form' => $form]);
    }
    
}
