<?php
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | 最低限の機能のみ実装した。
  | 管理者として必要と思われる「商品追加機能」のみ、
  | 比較的容易に実装可能と思われたため実装とした。
  |
*/

/**
 * 認証機能
 */
Auth::routes();

/**
 * 機能：商品の表示
 * ページ：/, /detail, /material
 **/
Route::get('/', 'Items\ItemsController@itemList');
Route::get('/detail', 'Items\ItemsController@detail');
Route::get('/material', 'Items\ItemsController@materialList');

/**
 * 機能：カートページ表示、カートに追加、リセット
 * ページ：/dispayCart
 **/
Route::get('/displayCart', 'Cart\CartController@displayCart');
Route::post('/additem', 'Cart\CartController@addItem');
Route::get('resetCart', 'Cart\CartController@resetCart');

/**
 * 機能：配送方法と支払い方法の選択、セッションの消去
 * ページ： /shipping, /settlement, /confirmation, /thanks
 * 各ページでログインが必須
 **/
Route::get('/shipping', 'Payment\PaymentController@shipping')->middleware('auth');

Route::post('/addShipping', 'Payment\PaymentController@addShipping')->middleware('auth');
Route::post('/settlement', 'Payment\PaymentController@addShipping');

Route::post('/addSettlement', 'Payment\PaymentController@addSettlement')->middleware('auth');
Route::post('/confirmation', 'Payment\PaymentController@addSettlement');

Route::get('resetShipping', 'Payment\PaymentController@resetShipping');
Route::get('resetSettlement', 'Payment\PaymentController@resetSettlement');
Route::get('resetOrder', 'Payment\PaymentController@resetOrder');

Route::post('/orderExecution', 'Payment\PaymentController@orderExecution')->middleware('auth');
Route::post('/thanks', 'Payment\PaymentController@orderExecution');

/**
 * 機能：メール送信
 * ページ：なし
 **/
Route::get('sample/mailable/preview', function () {
    return new App\Mail\ThanksMail();
});
Route::get('sample/mailable/send', 'MailTestController@ThanksMail');

/**
 * 機能：情報ページ
 * ページ：/siteInfo, /contact, /company
 **/
Route::get('/siteInfo', 'InformationController@siteInfo');
Route::get('/contact', 'InformationController@contact');
Route::get('/company', 'InformationController@company');

/**
 * 機能：商品の追加（管理者機能）
 * ページ：/admin, /admin/create, /admin/edit, 
 **/
Route::get('admin', 'Admin\ItemCreateController@index');

Route::get('admin/create', 'Admin\ItemCreateController@add');
Route::post('admin/create', 'Admin\ItemCreateController@create');

Route::get('admin/edit', 'Admin\ItemCreateController@edit');
Route::post('admin/edit', 'Admin\ItemCreateController@update');

Route::get('admin/delete', 'Admin\ItemCreateController@delete');

