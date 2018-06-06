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



//验证码
Route::get('/code','CodeController@makecode');
Route::get('/check','CodeController@checkcode');
Route::get('/show','CodeController@show');
Route::post('/store','CodeController@store');
//验证码测试结束测试结束

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


//前台主页模板路径
route::get('/','Home\HomeController@index');
//前台留言板路由
route::get('/home/board','Home\HomeController@board');
//前台关于我们路由
route::get('/home/about','Home\HomeController@about');
//前台文章列表路由
route::get('/home/article','Home\HomeController@article');
//前台留言板路由
route::get('/home/mood','Home\HomeController@mood');
//前台文章详情表路由
route::get('/home/articledetail/{id}','Home\HomeController@articledetail');
// 前台评论
route::post('/home/articledetail/{id}','Home\HomeController@comment');
route::post('/home/comment/{id}','Home\HomeController@recomment');

//前台登录
Route::controller('/home/login','Home\LoginController');
//前台用户退出路由
Route::get('/home/logout','Home\HomeController@logout');
//前台主页面
Route::get('/home/home','Home\LoginController@index');
//前台检测登录
Route::post('/home/ajax1',function(){

   // return $_POST['uname'];
   $uname=$_POST['username'];
   //return $name;
   $res=DB::table('users')->where('username','=',$uname)->first();
   if($res){return 1;}else{
    return 0;
   }

});
//邮箱激活路由
Route::get('/home/jihuo','Home\LoginController@jihuo');
//用户点击头像显示个人中心路由
Route::get('/home/userinfo/userinfo',function(){
    return view('home.userinfo.userinfo');
});

//添加收藏de 路由
Route::get('/home/addcollection/{id}','Home\CollectController@add');
//删除取消收藏的路由
Route::get('home/delcollection/{id}','Home\CollectController@del');
