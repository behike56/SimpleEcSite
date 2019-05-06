<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $timestamps = false;

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
        'orderName',
        'orderEmail',
        'orderPhoneNumber',
        'orderAddress',
        'orderItems',
        'totalPrice',
        'delivery',
        'payMethod'
    ];

    /**
     * ヴァリデーション用ルール
     *
     * @var array $rules
     */
    public static $rules = [
        'orderName' => 'required',
        'orderEmail' => 'required',
        'orderPhoneNumber' => 'required',
        'orderAddress' => 'required',
        'orderItems' => 'required',
        'totalPrice' => 'required',
        'delivery' => 'required'
    ];
}

