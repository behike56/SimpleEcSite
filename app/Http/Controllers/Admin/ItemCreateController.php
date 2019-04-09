<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	return view('items.create');
    }

    /**
     * 商品データ作成
     * @parameter ()
     * @return ('Request $request')
     * @return
     * DB 
     **/
    public function create(Request $request){

	$this->validate($request, Profile::$rules);

	$profile = new Profile;
	$data = $request->all(); 

	$profile->fill($data);
	$profile->save();
	
	
	return redirect('admin/profile');
    }
    
}
