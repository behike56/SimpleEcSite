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

	$imageNow = Carbon::now();


	if (isset($form['items_image'])) {
            $path = $request->file('items_image')->getClientOriginalName();
	    $trueName = $imageNow->format('Y-m-d_H:i:s').$path;
	    $request->file('items_image')->storeAs('public/image/', $trueName);

            
	} else {
            $items->items_image = null;
	}
	
	unset($form['_token']);
	/* 	unset($form['items_image']); */
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
