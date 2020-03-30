<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('admin.login');
//});
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/doLogin','Admin\LoginController@doLogin');
Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['isLogin']],function(){
    //后台首页路由
    Route::get('index','LoginController@index');

    //"情况统计"模块路由
    Route::get('statistic/totalArticle','StatisticController@totalArticle');

    //"文章管理"模块路由
    Route::get('article','ArticleController@article');
    Route::get('article/delete','ArticleController@delete');//删除
});
//登录后退出路由
Route::get('admin/logout','Admin\LoginController@logout');
