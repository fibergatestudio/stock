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

//Главная Страница
Route::get('/', 'MainController@index_page');

Auth::routes();

//Регистрация (?)
Route::get('/home', 'HomeController@index')->name('home');

//Аккаунт
Route::get('/account/{id}', 'MainController@account');
