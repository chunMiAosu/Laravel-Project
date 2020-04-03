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

Route::get('/login','LoginController@login'); //登录
Route::post('/doLogin','LoginController@doLogin');
Route::get('/register','LoginController@register'); //注册（只有普通用户需要注册）
Route::post('/doRegister','LoginController@doRegister');

Route::group(['middleware' => ['isLogin']],function() {
    //登录后退出路由
    Route::get('/logout','LoginController@logout');
    //后台首页路由
    Route::get('admin/index','LoginController@index')->middleware('hasPer');
    //返回网站首页
    Route::get('/home','LoginController@home');
    Route::get('/home/{type}','LoginController@homeType');
});


Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['isLogin','hasPer']],function(){

    //"情况统计"模块路由
    Route::get('statistic/totalArticle','StatisticController@totalArticle');

    //"文章管理"模块路由
    Route::get('article','ArticleController@article');
    Route::get('article/delete','ArticleController@delete');//删除

    Route::group(['prefix' => 'me'],function() {
        //"我"模块路由
        Route::get('editor', 'MeController@editor');
        Route::post('doEditor', 'MeController@doEditor');
        Route::post('saveDraft', 'MeController@saveDraft');//将文章存到草稿箱
        Route::get('draft', 'MeController@draft');
        //   Route::get('me/authorWorking','MeController@authorWorking');//编辑员的审核中
        Route::get('auditorWorking','MeController@auditorWorking');//审核员的审核中
        Route::get('auditorWorkingRes/{id}/{res}','MeController@auditorWorkingRes');//审核员做出审核判断
        Route::get('auditorRes/{status}','MeController@auditorRes');//审核员查看审核过的文章
    });
});
//返回没有权限的页面
Route::get('/noPermission','LoginController@noPermission');

