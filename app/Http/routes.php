<?php
use App\Bingren;
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



Route::auth();//这个是laravel预设的验证登录的路由，就是当url结尾是"/login" "password" "reset"一系列的时候，路由会自动指向他们所对应的视图
//登陆之后跳转到的页面，可以在app/Http/Controller/Auth/AuthController中设置

Route::group(['middleware'=>'auth','namespace'=>'Admin','prefix'=>'admin'],function(){//这个东西叫路由组，我也没太搞懂，大概就是可以自动生成url
	Route::get('bingren', 'BingrenController@index');
	Route::resource('bingren', 'BingrenController');
	Route::resource('ruyuanjilu','RuyuanjiluController');
	//这个resources是RESTful的东西，自带一整套路由设置，对应create,edit,destroy等方法
});

Route::group(['middleware'=>'auth'],function(){
	Route::get('/', function () {
    return view('welcome');
});//当url是localhost:1024/的时候，转到welcome视图
	Route::get('/home', 'HomeController@index');
//HomeContrller@index的意思是调用HomeController中index函数
});
