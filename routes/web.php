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

Route::get('/', function () {
    return view('welcome');
});

//后台
Route::namespace('Admin')->prefix('admin')->group(function(){
    /*后台模版样式开始*/
    Route::any('index', 'IndexController@index');
    Route::any('login', 'IndexController@login');
    Route::any('blank', 'IndexController@blank');
    Route::any('buttons', 'IndexController@buttons');
    Route::any('flot', 'IndexController@flot');
    Route::any('forms', 'IndexController@forms');
    Route::any('grid', 'IndexController@grid');
    Route::any('icons', 'IndexController@icons');
    Route::any('morris', 'IndexController@morris');
    Route::any('notifications', 'IndexController@notifications');
    Route::any('panelsWells', 'IndexController@panelsWells');
    Route::any('tables', 'IndexController@tables');
    Route::any('typography', 'IndexController@typography');
    /*后台模版样式结束*/
    //商品分类
    Route::any('goodsCate','GoodsController@cate');
    Route::any('goodsCateAdd/{id?}','GoodsController@cateAdd')->where(['id' => '\d+']);
    Route::any('goodsCateDel/{id?}','GoodsController@cateDel')->where(['id' => '\d+']);
    Route::any('goodsCateAddAction','GoodsController@cateAddAction');
    //商品列表
    Route::any('goodsList','GoodsController@index');
    Route::any('goodsAdd/{id?}','GoodsController@add');
    Route::any('goodsDel/{id?}','GoodsController@del')->where(['id' => '\d+']);
    Route::any('goodsAddAction','GoodsController@addAction');
});