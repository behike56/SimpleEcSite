<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * 
     * @parameter ()
     * @return ('items.item_list')
     * @return
     **/
    public function itemList()
    {
	return view('items.items');
    }
    
}
