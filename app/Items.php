<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'items_name' => 'required',
        'descriptions' => 'required',
	'items_image' => 'required',
	'stock' => 'required',
	'price' => 'required',
	
    );
}
