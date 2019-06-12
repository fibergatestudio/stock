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

//-- ГЛАВНАЯ СТРАНИЦА --//
    //Главная Страница
    Route::get('/', 'MainController@index_page');

Auth::routes();

//-- ФЕЙСБУК ЛОГИН --//
    //Переадресация на ФБ
    Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','facebook');
    //Коллбэк с фейсбука
    Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','facebook');

//Регистрация (?)
Route::get('/home', 'HomeController@index')->name('home');

//-- АККАУНТ СУПЕР АДМИНА --//
    //Аадминка (Страница)
    Route::get('/account/{id}/admin', 'MainController@account')->middleware('auth');
    //Страница Юзеров
    Route::get('/account/{id}/admin/users_table', 'MainController@admin_users_table')->middleware('auth');

//-- АККАУНТ ПОЛЬЗОВАТЕЛЯ --//
    //Аккаунт (Мой Аккаунт)
    Route::get('/account/{id}', 'MainController@account')->middleware('auth');

    //Сообщения (Мои Сообщения)
    Route::get('/account/{id}/messages', 'MainController@account_messages')->middleware('auth');
        //Сообщения - Переместить в Архив
        Route::post('/account/{id}/messages/{message_id}/archive', 'MainController@account_messages_archive')->middleware('auth');

    //Настройки (Мои Настройки)
    Route::get('/account/{id}/settings', 'MainController@account_settings')->name('account_settings')->middleware('auth');
        //Настройки - Изменить пароль
        Route::post('/account/settings/change_password', 'ChangePasswordController@change_password');
        //Настройки - Изменить настройки
        Route::post('/account/{id}/settings/apply_settings', 'MainController@account_settings_apply')->middleware('auth');
        //Настройки - Изменить настройки шкафа
        Route::post('/account/{id}/settings/apply_locker_settings', 'MainController@account_locker_settings_apply')->middleware('auth');
        //Настройки - Сохранить уведомления
        Route::post('/account/{id}/settings/apply_notifications', 'MainController@account_lapply_notifications')->middleware('auth');

    //Избранное (?) (Избранные товары)
    Route::get('/account/{id}/favorites', 'MainController@account_favorites')->middleware('auth');
        //Добавить в избранное (ЛАЙК)
        Route::post('{id}/{product_id}/like', 'MainController@product_like');

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
        //Кошелек - Применить настройки
        Route::post('/account/{id}/wallet/apply_changes', 'MainController@account_wallet_apply_changes')->middleware('auth');

    //Пригласить друзей
    Route::get('/account/{id}/invites', 'MainController@account_invites')->middleware('auth');
    
//-- КОНЕЦ АККАУНТА ПОЛЬЗОВАТЕЛЯ --//
