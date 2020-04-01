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

    //"我"模块路由
    Route::get('me/editor','MeController@editor');
    Route::post('me/doEditor','MeController@doEditor');
    Route::post('me/saveDraft','MeController@saveDraft');//将文章存到草稿箱
    Route::get('me/draft','MeController@draft');
//    Route::get('me/draftToEdit','MeController@draftToEdit');//草稿箱到编辑器继续编辑
//    Route::get('me/editorDraft','MeController@editorDraft');//继续编辑返回有编辑内容的编辑器
});
//登录后退出路由
Route::get('admin/logout','Admin\LoginController@logout');
