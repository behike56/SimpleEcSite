<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    /**
     * 複数代入しない属性
     *
     * @var array $guarded
     */
    protected $guarded = ['id'];

    /**
     * 複数代入する属性
     *
     * @var array $fillable
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

    /**
     * ヴァリデーション用ルール
     *
     * @var array $rules
     */
    public static $rules = [
        'items_name' => 'required',
        'descriptions' => 'required',
        'stock' => 'required',
        'price' => 'required'	
    ];
}

