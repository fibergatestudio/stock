<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\AccountSales;
use App\AccountPurchases;
use App\AccountMessages;
use App\AccountWallet;

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

        $all_products = DB::table('account_locker')
        ->join('users', 'account_locker.user_id', '=', 'users.id')
        ->select(
            'account_locker.*',
            'users.name AS seller_name',
        )
        ->get();

        return view('index_page',[
            'id' => $id,
            'all_products' => $all_products,
        ]);
    }

    
    //Аккаунт (Мой Аккаунт)
    public function account($id){



        return view('account.account_page',[
            'id' => $id,
        ]);
    }

    //-- СООБЩЕНИЯ --//
        //Сообщения (Мои Сообщения)
        public function account_messages($id){

            $account_sent_messages = DB::table('account_messages')->where('user_id', $id)->where('status', 'sent')->get();
            $account_received_messages = DB::table('account_messages')->where('user_id', $id)->where('status', 'received')->get();
            $account_archived_messages = DB::table('account_messages')->where('user_id', $id)->where('status', 'archived')->get();

            return view('account.account_messages',[
                'id' => $id,
                'account_sent_messages' => $account_sent_messages,
                'account_received_messages' => $account_received_messages,
                'account_archived_messages' => $account_archived_messages
            ]);
        }
        public function account_messages_archive(Request $request){

            $id = $request->message_id;

            DB::table('account_messages')
            ->where('id', '=', $id)
            ->update(['status' => 'archived']);

            return back();

        }

    //-- НАСТРОЙКИ --//
        //Настройки (Мои Настройки)
        public function account_settings($id){

            $user_settings = DB::table('user_settings')->where('user_id', $id)->first();
            
            return view('account.account_settings',[
                'id' => $id,
                'user_settings' => $user_settings
            ]);
        }
        public function account_settings_apply(Request $request){

            $id = $request->id;

            $full_name = $request->full_name;
            $email = $request->email;
            $code = $request->code;
            $phone = $request->phone;

            $phone_complete = array($code, $phone);
            $phone_number = implode('', $phone_complete);

            //dd($id, $phone_number);

            DB::table('user_settings')
            ->where('user_id', '=', $id)
            ->update([
                'full_name' => $full_name,
                'email' => $email,
                'phone_number' => $phone_number
            ]);

            return back();

        }
        public function account_locker_settings_apply(Request $request){

            $id = $request->user_id;

            //dd($id);

            $displayed_name = $request->displayed_name;
            $city = $request->city;
            $birthday = $request->birthday;
            $additional_info = $request->additional_info;

            //dd($additional_info);

            //dd($additional_info);

            DB::table('user_settings')
            ->where('user_id', '=', $id)
            ->update([
                'displayed_name' => $displayed_name,
                'city' => $city,
                'birthday' => $birthday,
                'additional_info' => $additional_info
            ]);

            return back();
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

    //-- КОШЕЛЕК --//
        //Кошелек (Мой Кошелек)
        public function account_wallet($id){

            $account_wallet = DB::table('account_wallet')->where('user_id', $id)->first();

            return view('account.account_wallet',[
                'id' => $id,
                'account_wallet' => $account_wallet,
            ]);
        
        }
        public function account_wallet_apply_changes(Request $request){

            $id = $request->user_id;

            //dd($id);

            $card_name = $request->card_name;
            $card_number = $request->card_number;
            $card_date = $request->card_date;
            $card_cvv = $request->card_cvv;
            $card_address = $request->card_address;
            $card_city = $request->card_city;
            $card_country = $request->card_country;
            $card_state = $request->card_state;

            DB::table('account_wallet')
            ->where('user_id', '=', $id)
            ->update([
                'card_name' => $card_name,
                'card_number' => $card_number,
                'card_date' => $card_date,
                'card_cvv' => $card_cvv,
                'card_address' => $card_address,
                'card_city' => $card_city,
                'card_country' => $card_country,
                'card_cvv' => $card_cvv,
                'card_state' => $card_state
            ]);



            return back();
        }



    //Пригласить друзей
    public function account_invites($id){

        return view('account.account_invites',[
            'id' => $id,
        ]);
    }
}
