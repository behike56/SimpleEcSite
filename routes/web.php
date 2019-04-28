<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
*/
Auth::routes();

/**
 * 商品の表示
 * トップ画面兼商品一覧
 * 商品詳細
 * branch - items
 **/
Route::get('/', 'Items\ItemsController@itemList');
Route::get('material', 'Items\ItemsController@materialList');

Route::get('/detail', 'Items\ItemsController@detail');


/**
 * 商品の追加
 * 管理者による機能は追加改修予定
 * branch - items
 **/
Route::get('admin', 'Admin\ItemCreateController@index');

Route::get('admin/create', 'Admin\ItemCreateController@add');
Route::post('admin/create', 'Admin\ItemCreateController@create');

Route::get('admin/edit', 'Admin\ItemCreateController@edit');
Route::post('admin/edit', 'Admin\ItemCreateController@update');

Route::get('admin/delete', 'Admin\ItemCreateController@delete');

/**

 * branch - cart
 **/
Route::get('/displayCart', 'Cart\CartController@displayCart');
Route::post('/additem', 'Cart\CartController@addItem');

Route::get('resetCart', 'Cart\CartController@resetCart');

/**
 * 会計
 * 発送方法の選択、支払い方法の選択、サンクスページ
 **/
Route::get('/addOrders', 'Payment\PaymentController@addOrders');
Route::get('/shipping', 'Payment\PaymentController@shipping');
Route::get('/settlement', 'Payment\PaymentController@settlement');
Route::get('/thanks', 'Payment\PaymentController@thanks');
