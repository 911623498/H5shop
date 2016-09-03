<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',"LoginController@login");

/*
|--------------------------------------------------------------------------
| App Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::any('index/index',"IndexController@index");//首页
    Route::any('index/login',"IndexController@login");//登录

    Route::any('Login/reuser',"LoginController@reuser");//登陆验证

    Route::any('index/head', 'IndexController@head');//头部
	Route::any('index/left', 'IndexController@left');//左侧
	Route::any('index/right', 'IndexController@right');//右侧
	
	Route::any('Shop/shoplist', 'ShopController@shoplist');//店铺列表
    Route::any('Shop/shoplists', 'ShopController@shoplists');//店铺列表
    Route::any('Shop/shopadd', 'ShopController@shopadd');//店铺添加
    Route::any('Shop/shopweiyi', 'ShopController@shopweiyi');//店铺验证唯一
    Route::any('Shop/shoptianjia', 'ShopController@shoptianjia');//店铺添加
    Route::any('Shop/shopdels', 'ShopController@shopdels');//店铺删除

    Route::any('Type/typeadd', 'TypeController@typeadd');//分类添加
    Route::any('Type/typetianjia', 'TypeController@typetianjia');//分类添加
    Route::any('Type/typedels', 'TypeController@typedels');//分类删除
    Route::any('Type/typeupd', 'TypeController@typeupd');//分类修改
    Route::any('Type/typeupds', 'TypeController@typeupds');//分类修改
    Route::any('Type/typelist', 'TypeController@typelist');//分类列表
    Route::any('Type/typelists', 'TypeController@typelists');//分类列表


	Route::any('Goods/goodsadd', 'GoodsController@goodsadd');//商品添加
    Route::any('Goods/goodslist', 'GoodsController@goodslist');//商品列表
    Route::any('Brand/brandadd', 'BrandController@brandadd');//文章管理
    Route::any('Brand/brandlist', 'BrandController@brandlist');//文章管理
	Route::any('Search/search', 'SearchController@search');//搜索

	Route::any('User/user', 'UserController@user');//管理员列表
	Route::any('System/changepwd', 'SystemController@changepwd');//系统管理
	Route::any('System/change', 'SystemController@change');//验证密码
	Route::any('System/changepwds', 'SystemController@changepwds');//修改密码
	Route::any('System/tuichu', 'SystemController@tuichu');//退出登录
	Route::any('User/pages', 'UserController@pages');//修改密码
	
});


