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
 * 機能：商品の表示
 * ページ：トップ画面兼商品一覧、商品詳細
 **/
Route::get('/', 'Items\ItemsController@itemList');
Route::get('/detail', 'Items\ItemsController@detail');
Route::get('/material', 'Items\ItemsController@materialList');

/**
 * 機能：カートに追加、リセット
 * ページ：カート
 **/
Route::get('/displayCart', 'Cart\CartController@displayCart');
Route::post('/additem', 'Cart\CartController@addItem');
Route::get('resetCart', 'Cart\CartController@resetCart');

/**
 * 機能：会計（配送方法と支払い方法の選択、
 * 発送方法の選択、支払い方法の選択、サンクスページ
 * ログインが必須
 **/
Route::get('/shipping', 'Payment\PaymentController@shipping')->middleware('auth');

Route::post('/addShipping', 'Payment\PaymentController@addShipping')->middleware('auth');
Route::post('/settlement', 'Payment\PaymentController@addShipping');

Route::post('/addSettlement', 'Payment\PaymentController@addSettlement');
Route::post('/confirmation', 'Payment\PaymentController@addSettlement');

Route::get('resetShipping', 'Payment\PaymentController@resetShipping');
Route::get('resetSettlement', 'Payment\PaymentController@resetSettlement');
Route::get('resetOrder', 'Payment\PaymentController@resetOrder');

Route::get('/thanks', 'Payment\PaymentController@thanks');


/**
 * 商品の追加
 * 管理者による機能は追加改修予定
 **/
Route::get('admin', 'Admin\ItemCreateController@index');

Route::get('admin/create', 'Admin\ItemCreateController@add');
Route::post('admin/create', 'Admin\ItemCreateController@create');

Route::get('admin/edit', 'Admin\ItemCreateController@edit');
Route::post('admin/edit', 'Admin\ItemCreateController@update');

Route::get('admin/delete', 'Admin\ItemCreateController@delete');
