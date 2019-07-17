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
    Route::get('/account/{id}/admin/users_table', 'AdminController@admin_users_table')->middleware('auth');
        //Удалить юзера
        Route::get('/account/{id}/admin/users_table/{user_id}/delete', 'AdminController@admin_delete_user')->middleware('auth');
        //Изменить роль юзера
        Route::get('/account/{id}/admin/users_table/{user_id}/change_role', 'AdminController@admin_change_user_role')->middleware('auth');
        //Админка (Страница Юзеров), отправка сообщений
        Route::post('/admin/send_message', 'AdminController@send_message');

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
        //Корзина - Добавить в избранное
        Route::post('/account/{id}/cart/{product_id}/add_favorite', 'MainController@cart_add_favorite')->middleware('auth');
        //Корзина - Удалить товар
        Route::post('/account/{id}/cart/{product_id}/delete', 'MainController@cart_delete_product')->middleware('auth');
        //Корзина - Добавить товар (тест)
        Route::get('/account/{id}/cart/add_prod', 'MainController@cart_add_prod')->middleware('auth');

    //Шкаф (Мой Шкаф)
    Route::get('/account/{id}/locker', 'MainController@account_locker')->middleware('auth');
        //Шкаф (Добавить Товар : Страница)
        Route::get('/account/{id}/locker/add_item', 'MainController@account_locker_add_item_index')->middleware('auth');
            //Шкаф (Добавить товар : GET) (Not Rdy)
            Route::get('/account/{id}/locker/add_item_post', 'MainController@account_locker_add_item')->middleware('auth');

        //Шкаф (Удалить Товар : GET)
        Route::get('/account/{id}/locker/delete_item/{item_id}', 'MainController@account_locker_delete_item')->middleware('auth');

        //Шкаф (Активные ссылки)
        Route::get('/account/{id}/locker/active_links', 'MainController@account_locker_active_links')->middleware('auth');
        //Шкаф (Черновики)
        Route::get('/account/{id}/locker/drafts', 'MainController@account_locker_drafts')->middleware('auth');
        //Шкаф (Удалены)
        Route::get('/account/{id}/locker/deleted', 'MainController@account_locker_deleted')->middleware('auth');
        //Шкаф (Продано)
        Route::get('/account/{id}/locker/sold_out', 'MainController@account_locker_sold_out')->middleware('auth');


        //Шкаф (Изменить Никнейм)
        Route::post('/account/{id}/locker/change_nickname', 'MainController@locker_change_nickname')->middleware('auth');
        //Шкаф (Изменить Бэкграунд)
        Route::post('/account/{id}/locker/change_background', 'MainController@locker_change_background')->middleware('auth');
        //Шкаф (Изменить Аватар)
        Route::post('/account/{id}/locker/change_profile_picture', 'MainController@locker_change_profile_picture')->middleware('auth');

    //Продажи (Мои Продажи)
    Route::get('/account/{id}/sales', 'MainController@account_sales')->middleware('auth');
        //Продажи (Все продажи)
        Route::get('/account/{id}/sales/all', 'MainController@account_sales_all')->middleware('auth');
        //Продажи (Ожидает подтверждения)
        Route::get('/account/{id}/sales/unconfirmed', 'MainController@account_sales_unconfirmed')->middleware('auth');
        //Продажи (Завершены)
        Route::get('/account/{id}/sales/completed', 'MainController@account_sales_completed')->middleware('auth');
    //Покупки (Мои Покупки)
    Route::get('/account/{id}/purchases', 'MainController@account_purchases')->middleware('auth');
    //Кошелек (Мой Кошелек)
    Route::get('/account/{id}/wallet', 'MainController@account_wallet')->middleware('auth');
        //Кошелек - Применить настройки
        Route::post('/account/{id}/wallet/apply_changes', 'MainController@account_wallet_apply_changes')->middleware('auth');

    //Пригласить друзей
    Route::get('/account/{id}/invites', 'MainController@account_invites')->middleware('auth');

//-- КОНЕЦ АККАУНТА ПОЛЬЗОВАТЕЛЯ --//
