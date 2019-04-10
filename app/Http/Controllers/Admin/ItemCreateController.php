<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

Use App\Items;

use Carbon\Carbon;

class ItemCreateController extends Controller
{

    /**
     * 商品追加ページ
     * @parameter ()
     * @return ('')
     * @return
     **/
    public function add()
    {
	return view('admin.create');
    }

    /**
     * 商品データ作成
     * @parameter (Request $request)
     * @return redirect('admin/index')
     * DB :items
     **/
    public function create(Request $request){

	$this->validate($request, Items::$rules);

	$items = new Items;
	$form = $request->all();


	if (isset($form['items_image'])) {
            $path = $request->file('items_image')->store('public/image');
            $items->items_image = basename($path);
	} else {
            $items->items_image = null;
	}

	$items->fill($form);
	$items->save();
	
	return redirect('admin');
    }

    /**
     * 商品データ作成
     * @parameter ()
     * @return ('Request $request')
     * @return
     * DB 
     **/
    public function index(Request $request){

	$form = Items::all();
	return view('admin.list', ['form' => $form]);
    }

    /**
     * 商品データ作成
     * @parameter ()
     * @return ('Request $request')
     * @return
     * DB 
     **/
    /* public function edit(Request $request){
     * } */

    /**
     * 商品データ作成
     * @parameter ()
     * @return ('Request $request')
     * @return
     * DB 
     **/
    /* public function update(Request $request){
     * } */

    /**
     * 商品データ作成
     * @parameter ()
     * @return ('Request $request')
     * @return
     * DB 
     **/
    /* public function delete(Request $request){
     * } */
    
}
