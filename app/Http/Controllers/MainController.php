<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\AccountSales;
use App\AccountPurchases;

class MainController extends Controller
{
    //Главная страница
    public function index_page(){

        //Проверка залогинен ли Юзер
        if($user = Auth::user())
        {
            //Берем айдишник
            $id = Auth::user()->id;
        }
        else if(Auth::guest())
        {
            //Не берем айдишник
            $id = 'null';
        }

        return view('index_page',[
            'id' => $id,
        ]);
    }

    
    //Аккаунт (Мой Аккаунт)
    public function account($id){



        return view('account.account_page',[
            'id' => $id,
        ]);
    }

    //Сообщения (Мои Сообщения)
    public function account_messages($id){

        return view('account.account_messages',[
            'id' => $id,
        ]);
    }

    //Настройки (Мои Настройки)
    public function account_settings($id){
        
        return view('account.account_settings',[
            'id' => $id,
        ]);
    }

    //Избранное (?) (Избранные товары)
    public function account_favorites($id){
        
        return view('account.account_favorites',[
            'id' => $id,
        ]);
    }

    //Корзина (Моя корзина)
    public function account_cart($id){
        
        return view('account.account_cart',[
            'id' => $id,
        ]);
    }

    //Шкай (Мой Шкаф)
    public function account_locker($id){

        $locker = DB::table('account_locker')->where('user_id', $id)->get();

        return view('account.account_locker',[
            'id' => $id,
            'account_locker' => $locker,
        ]);
    }
    

    //Продажи (Мои Продажи)
    public function account_sales($id){

        //Подтяжка Продаж
        $sales = DB::table('account_sales')->where('user_id', $id)->get();

        return view('account.account_sales',[
            'id' => $id,
            'account_sales' => $sales,
        ]);
    }

    //Покупки (Мои Покупки)
    public function account_purchases($id){

        //Подтяжка Покупок
        $purchases = DB::table('account_purchases')->where('user_id', $id)->get();

        //dd($purchases);

        return view('account.account_purchases',[
            'id' => $id,
            'account_purchases' => $purchases,
        ]);
    }

    //Кошелек (Мой Кошелек)
    public function account_wallet($id){

        return view('account.account_wallet',[
            'id' => $id,
        ]);
    }

    //Пригласить друзей
    public function account_invites($id){

        return view('account.account_invites',[
            'id' => $id,
        ]);
    }
}
