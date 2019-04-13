<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    /**
     * 複数代入しない属性
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = [
	'items_name',
	'items_image',
	'flowering_time',
	'full_length',
	'descriptions',
	'stock',
	'price'
    ];

    public static $rules = [
	'items_name' => 'required',
	'descriptions' => 'required',
	'stock' => 'required',
	'price' => 'required'	
    ];
}
