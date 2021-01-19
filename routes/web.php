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
Route::get('/', 'UserController@index')->name('index');
Route::get('/contact', 'UserController@contact')->name('contact.view');
Route::get('/about', 'UserController@about')->name('about.view');
Route::get('/guidelines', 'UserController@guidelines')->name('guidelines.view');

Route::post('/register-res','UserController@registerRes')->name('register.res');
Route::post('/register-com','UserController@registerCom')->name('register.com');
Route::get('/getproperty','UserController@getProperty')->name('property.get');
Route::get('/properties','UserController@mapPage')->name('map.view');
Route::get('/login/{id}','Auth\LoginController@showLoginForm')->name('login.view');
Route::get('/admin/login','Auth\LoginController@showAdminLoginForm')->name('admin.login.view');
Route::get('/admin/dashboard','AdminController@dashboard')->name('main.admin.dashboard')->middleware('auth');
Route::get('/admin/dashboard/commercial','AdminController@commercialShow')->name('admin.com')->middleware('auth');
Auth::routes();
Route::post('/login','Auth\LoginController@loginCustom')->name('login');
Route::post('/admin/login','Auth\LoginController@adminLoginCustom')->name('admin.login');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dasdboard-redirect', 'UserController@dashboardRedirect')->name('dasdboard.redirect');

Route::group([
    'middleware'=>'auth:residential',
    // 'middleware'=>'auth:commercial'
], function () {
  Route::get('/dashboard',[
    'uses'=>'UserController@dashboard',
    'as'=>'admin.dashboard',
  ]);

  Route::post("/payment",[
    'uses'=>'UserController@paymentSuccess',
    'as'=>'admin.payment'
  ]);
  Route::get("/invoice/{id}",[
    'uses'=>'UserController@invoice',
    'as'=>'payment.invoice'
  ]);

    });

Route::group([
  'middleware'=>'auth:commercial',
], function () {
Route::get('/commercial/dashboard',[
  'uses'=>'UserController@comDashboard',
  'as'=>'commercial.admin.dashboard',
]);

Route::post("/payment-com",[
  'uses'=>'UserController@paymentSuccess',
  'as'=>'admin.payment'
]);
Route::get("/invoice/{id}",[
  'uses'=>'UserController@invoice',
  'as'=>'payment.invoice'
]);

});
