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
    echo "hello world!";
});


//用户模块
//注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
//注册行为
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
//登录页面
Route::get('/login', '\App\Http\Controllers\LoginController@index');
Route::post('/login', '\App\Http\Controllers\LoginController@login');
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');
//个人设置页面
Route::get('/user/{user}/setting', '\App\Http\Controllers\UserController@setting');
//个人设置操作
Route::post('/user/{user}/setting', '\App\Http\Controllers\UserController@settingStore');

//文章模块
//文章列表
Route::get('/posts', '\App\Http\Controllers\PostController@index');

//创建文章页
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
//保存行为
Route::post('/posts', '\App\Http\Controllers\PostController@store');
//文章详情
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');

//编辑文章页
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
//保存行为
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
//删除文章
Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');

//上传图片
Route::post('/posts/image/upload', '\App\Http\Controllers\PostController@imageUpload');