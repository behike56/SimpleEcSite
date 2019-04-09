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
Route::get('/', 'User\ItemController@itemList');

Route::get('/detail', 'ItemController@detail');


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
