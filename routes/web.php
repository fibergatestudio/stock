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

//-- АККАУНТ ПОЛЬЗОВАТЕЛЯ --//
    //Аккаунт (Мой Аккаунт)
    Route::get('/account/{id}', 'MainController@account')->middleware('auth');

    //Сообщения (Мои Сообщения)
    Route::get('/account/{id}/messages', 'MainController@account_messages')->middleware('auth');

    //Настройки (Мои Настройки)
    Route::get('/account/{id}/settings', 'MainController@account_settings')->middleware('auth');

    //Избранное (?) (Избранные товары)
    Route::get('/account/{id}/favorites', 'MainController@account_favorites')->middleware('auth');

    //Корзина (Моя Корзина)
    Route::get('/account/{id}/cart', 'MainController@account_cart')->middleware('auth');

    //Шкай (Мой Шкаф)
    Route::get('/account/{id}/locker', 'MainController@account_locker')->middleware('auth');

    //Продажи (Мои Продажи)
    Route::get('/account/{id}/sales', 'MainController@account_sales')->middleware('auth');

    //Покупки (Мои Покупки)
    Route::get('/account/{id}/purchases', 'MainController@account_purchases')->middleware('auth');

    //Кошелек (Мой Кошелек)
    Route::get('/account/{id}/wallet', 'MainController@account_wallet')->middleware('auth');

    //Пригласить друзей
    Route::get('/account/{id}/invites', 'MainController@account_invites')->middleware('auth');
    
//-- КОНЕЦ АККАУНТА ПОЛЬЗОВАТЕЛЯ --//
