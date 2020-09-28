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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::any('/','IndexController@index');


Route::get('login','Login\LoginController@login');
Route::get('register','Login\LoginController@register');
Route::get('/getcode','Login\LoginController@getCode');
Route::any('/login/store','Login\LoginController@store');
Route::any('/login/create','Login\LoginController@create');