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
Route::get('/', 'ProductControllers@welcome');

Route::get('/product', [
        'uses' => 'ProductControllers@create',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => [ 'Author']
    ]);


Route::post('/product',[
        'uses' => 'ProductControllers@store',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Author']
    ]);

Route::get('/lista',  [
        'uses' => 'ProductControllers@index',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => [ 'Author']
    ]);

Route::get('/product/{codigo}', [
	'uses' => 'ProductControllers@show',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => [ 'Author']
    ]);
Route::get('/product/{codigo}/edit', [
'uses' => 'ProductControllers@edit',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => [ 'Author']
    ]);
Route::post('/product/{codigo?}/edit',[
'uses' => 'ProductControllers@update',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => [ 'Author']
    ]);
Route::post('/product/{codigo?}/delete', [
'uses' => 'ProductControllers@destroy',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => [ 'Author']
    ]);
Route::get('/blanco', [
'uses' => 'ProductControllers@inicioBodega',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => [ 'Author']
    ]);



Route::get('/cliente', [
'uses' => 'ClienteController@create',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::get('/listac', [
'uses' => 'ClienteController@index',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::post('/listac', [
'uses' => 'ClienteController@buscar',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::get('/cliente/{cedula}/edit', [
'uses' => 'ClienteController@edit',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::post('/cliente', [
'uses' => 'ClienteController@store',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::get('/cliente/{cedula?}', [
'uses' => 'ClienteController@show',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::get('/cliente/{cedula?}/edit', [
'uses' => 'ClienteController@edit',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::post('/cliente/{cedula?}', [
'uses' => 'ClienteController@destroy',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
Route::post('/cliente/{cedula?}/edit', [
'uses' => 'ClienteController@update',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin', 'Author']
    ]);
Route::get('/blancoc', [
'uses' => 'ClienteController@inicioAdmin',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);



 Route::get('/Venta',[
 'uses' => 'VentasController@index',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
 Route::post('/Venta', [
 'uses' => 'VBuscarController@index',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
 Route::get('/Venta/Create', [
 'uses' => 'VentasController@create',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
 Route::post('/Venta/Create', [
 'uses' => 'VentasController@store',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
 Route::get('/Venta/{idventa?}',[
'uses' => 'VentasController@show',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
