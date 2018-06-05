<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//后台首页路由
Route::get('/admin/admin','Admin\IndexController@index');

//后台 评论的路由
Route::resource('/admin/column','Admin\ColumnController');

// 后台 用户的路由
Route::resource('/admin/users','Admin\UsersController');

//后台拉黑用户专用路由
Route::post('/admin/users/lahei/{id}','Admin\UsersController@lahei');

//后台登录页面路由
Route::get('/admin/login','Admin\LoginController@index');

//登录后台管理员验证路由
Route::post('/admin/dologin','Admin\LoginController@dologin');

//后台管理员退出路由
Route::get('/admin/logout','Admin\LoginController@logout');

// 后台 文章的路由
Route::resource('/admin/articles','Admin\ArticlesController');

//后台头部显示修改登陆后管理人员的密码
Route::get('/admin/resetpwd','Admin\IndexController@writepwd');

//跳转到执行后台修改密码的控制器方法
Route::post('/admin/resetpwd/{id}','Admin\IndexController@resetpwd');

//查看友情链接
Route::resource('/admin/friendlylink','Admin\FriendlyLinkController');
//禁用友情链接路由
Route::post('/admin/friendlylink/disable/{id}','Admin\FriendlyLinkController@disable');
//启用友情链接路由
Route::post('/admin/friendlylink/able/{id}','Admin\FriendlyLinkController@able');


//查看广告位
Route::resource('/admin/advertise','Admin\AdvertiseController');
//禁用广告位路由
Route::post('/admin/advertise/disable/{id}','Admin\AdvertiseController@disable');
//启用广告位路由
Route::post('/admin/advertise/able/{id}','Admin\AdvertiseController@able');
//广告位分类路由
Route::get('/admin/adclass','Admin\AdvertiseController@adclass');

