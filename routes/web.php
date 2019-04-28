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

/**
 * 会計
 * 発送方法の選択、支払い方法の選択、サンクスページ
 **/
Route::get('/addOrders', 'Payment\PaymentController@addOrders');
Route::get('/shipping', 'Payment\PaymentController@shipping');
Route::get('/settlement', 'Payment\PaymentController@settlement');
Route::get('/thanks', 'Payment\PaymentController@thanks');
