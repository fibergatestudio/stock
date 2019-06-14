<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Storage;
use App\AccountLocker;
use App\AccountSales;
use App\AccountPurchases;
use App\AccountMessages;
use App\AccountWallet;
use App\AccountLikes;
use App\AccountCart;


class MainController extends Controller
{
    //Главная страница
    public function index_page(){

        //Проверка залогинен ли Юзер
        if($user = Auth::user())
        {
            //Берем айдишник
            $id = Auth::user()->id;
            $role = Auth::user()->role;
        }
        else if(Auth::guest())
        {
            //Не берем айдишник
            $id = 'null';
            $role = 'null';
        }

        $all_products = DB::table('account_locker')
        ->join('users', 'account_locker.user_id', '=', 'users.id')
        ->select(
            'account_locker.*',
            'users.name AS seller_name'
        )
        ->get();

        if($role == 'admin'){

            return view('admin.admin_home',[
                'id' => $id,
                'all_products' => $all_products,
            ]);

        } elseif ($role == 'user') {

            return view('index_page',[
                'id' => $id,
                'all_products' => $all_products,
            ]);

        } else {

            return view('index_page',[
                'id' => $id,
                'all_products' => $all_products,
            ]);

        }

    }

    //-- СУПЕР АДМИН --//
        // //Админ - Таблица Юзеров
        // public function admin_users_table($id){

        //     $users = DB::table('users')->get();


        //     return view('admin.admin_users_table',[
        //         'id' => $id,
        //         'users' => $users,
        //         'sent_message' => ''
        //     ]);
        // }
        // //Админ - Удалить Юзера
        // public function admin_delete_user($id, $user_id){

        //     DB::table('users')->where('id', '=', $user_id)->delete();
        //     DB::table('user_settings')->where('id', '=', $user_id)->delete();

        //     return back();
        // }

        // //Админ - Изменить Роль
        // public function admin_change_user_role($id, $user_id){


        //     $current_role = DB::table('users')->where('id', $user_id)->first();
        //     $role = $current_role->role;

        //     //dd($role, $id);

        //     if ($role == 'admin')
        //         DB::table('users')->where('id', '=', $user_id)
        //         ->update([
        //             'role' => 'user',
        //         ]);
        //     elseif ($role == 'user'){
        //         DB::table('users')->where('id', '=', $user_id)
        //         ->update([
        //             'role' => 'admin',
        //         ]);
        //     }

        //     return back();
        // }


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
        // Настройки (Мои Настройки)
        public function account_settings($id){

            $user_settings = DB::table('user_settings')->where('user_id', $id)->first();

            $notifications = $user_settings->notifications;

            $notification_exp = explode(',', $notifications);

            $user = DB::table('users')->where('id', $id)->first();

            return view('account.account_settings',[
                'id' => $id,
                'message' => '',
                'user_settings' => $user_settings,
                'notification_exp' => $notification_exp,
                'user' => $user
            ]);
        }
        // Применить Настройки
        public function account_settings_apply(Request $request){

            $id = $request->id;

            $full_name = $request->full_name;
            $email = $request->email;
            $code = $request->code;
            $phone = $request->phone;

            $phone_complete = array($code, $phone);
            $phone_number = implode('', $phone_complete);

            DB::table('user_settings')
            ->where('user_id', '=', $id)
            ->update([
                'full_name' => $full_name,
                'email' => $email,
                'phone_number' => $phone_number
            ]);


            return back();

        }
        //Применить Настройки Шкафа
        public function account_locker_settings_apply(Request $request){

            $id = $request->user_id;

            //dd($id);

            $displayed_name = $request->displayed_name;
            $city = $request->city;
            $birthday = $request->birthday;
            $additional_info = $request->additional_info;

            /* Сохраняем фото */
            //$request->profile_picture->store('public/'.$id);

            $settings = DB::table('user_settings')->where('user_id', '=', $id)->first();


            if (!empty($request->locker_background)){
                $locker_background = $request->locker_background->store('public/storage/'.$id);
            } else {
                $locker_background = $settings->locker_background;
            }


            if (!empty($request->profile_picture)){
                $profile_picture = $request->profile_picture->store('public/storage/'.$id.'/avatar');
            } else{
                $profile_picture = $settings->profile_picture;
            }

            //dd($request->locker_background->store('public/'.$id));

            //dd($additional_info);

            //dd($additional_info);

            DB::table('user_settings')
            ->where('user_id', '=', $id)
            ->update([
                'profile_picture' => $profile_picture,
                'locker_background' => $locker_background,
                'displayed_name' => $displayed_name,
                'city' => $city,
                'birthday' => $birthday,
                'additional_info' => $additional_info
            ]);

            $username = $request->username;
            //dd($username);

            DB::table('users')
            ->where('id', '=', $id)
            ->update([
                'name' => $username,
            ]);

            return back();
        }
        public function account_lapply_notifications(Request $request){

            $id = $request->user_id;

            $new_income = $request->new_income;
            $sales_discounts = $request->sales_discounts;

            if(empty($new_income)){

                $new_income_notification = 0;

            } else {

                $new_income_notification = 1;

            }

            if(empty($sales_discounts)){

                $sales_discounts_notification = 0;

            } else {

                $sales_discounts_notification = 1;

            }

            $notif_array = array($sales_discounts_notification, $new_income_notification);

            //dd($notif_array);



            $implode_notifications = implode(',', $notif_array);

            DB::table('user_settings')
            ->where('user_id', '=', $id)
            ->update([
                'notifications' => $implode_notifications,
            ]);

            return back();
        }

    //Избранное (?) (Избранные товары)
    public function account_favorites($id){

        //Вывод товаров на которых есть "лайк"
        $likes = AccountLikes::where('account_likes.user_id', $id)
        ->join('account_locker', 'account_likes.product_id', '=', 'account_locker.id')
        ->select(
            'account_likes.*',
            'account_locker.description AS product_name',
            'account_locker.price AS product_price'
        )
        ->get();


        return view('account.account_favorites',[
            'id' => $id,
            'likes' => $likes
        ]);
    }
    public function product_like(Request $request){

        $id = $request->user_id;
        $product_id = $request->product_id;

        //Таблица Лайков
        $likes = DB::table('account_likes')->where('user_id',$id)->where('product_id', $product_id)->first();

        //Если лайка нету
        if ( empty($likes)){

            //Добавляем лайк к товару
            DB::table('account_locker')->where('id', $product_id)->increment('likes');

            //Добавляем лайк в бд
            $new_like = new AccountLikes();
            $new_like->user_id = $id;
            $new_like->product_id = $product_id;
            $new_like->save();

            //Если лайк есть
        } else {

            //Убираем лайк
            DB::table('account_locker')->where('id', $product_id)->decrement('likes');

            //Убираем запись из бд
            DB::table('account_likes')
            ->where([
                ['user_id','=', $id],
                ['product_id','=', $product_id]
            ])
            ->delete();
        }

        return back();
    }

    //-- КОРЗИНА --//
        //Корзина (Моя корзина)
        public function account_cart($id){

            $cart_items = DB::table('account_cart')->where('user_id', $id)->get();
            $cart_sum = DB::table('account_cart')->where('user_id', $id)->sum('price');
            $cart_count = DB::table('account_cart')->where('user_id', $id)->count();

            return view('account.account_cart',[
                'id' => $id,
                'cart_items' => $cart_items,
                'cart_sum' => $cart_sum,
                'cart_count' => $cart_count
            ]);
        }
        //Корзина - Добавить в избранное
        public function cart_add_favorite(Request $request){

            $product_id = $request->product_id;
            $id = $request->user_id;

            //Таблица Лайков
            $likes = DB::table('account_likes')->where('user_id',$id)->where('product_id', $product_id)->first();

            //Если лайка нету
            if ( empty($likes)){

                //Добавляем лайк к товару
                DB::table('account_locker')->where('id', $product_id)->increment('likes');

                //Добавляем лайк в бд
                $new_like = new AccountLikes();
                $new_like->user_id = $id;
                $new_like->product_id = $product_id;
                $new_like->save();

                //Если лайк есть
            } else {

                //Убираем лайк
                DB::table('account_locker')->where('id', $product_id)->decrement('likes');

                //Убираем запись из бд
                DB::table('account_likes')
                ->where([
                    ['user_id','=', $id],
                    ['product_id','=', $product_id]
                ])
                ->delete();
            }

            return back();
        }

        //Корзина - Удалить Товар
        public function cart_delete_product(Request $request){

            $product_id = $request->product_id;

            DB::table('account_cart')->where('id', $product_id)->delete();

            return back();
        }
        //Коризна - Добавить Товар (ТЕСТ)
        public function cart_add_prod($id){

            $new_prod = new AccountCart();
            $new_prod->user_id = $id;
            $new_prod->product_id = '1';
            $new_prod->product_title = 'TestTitle';
            $new_prod->product_description = 'TestDescription';
            $new_prod->price = '250';
            $new_prod->delivery = 'Включена';
            $new_prod->save();

            return back();
        }

    //-- ШКАФ --//
        //Шкай (Мой Шкаф)
        public function account_locker($id){

            $locker = DB::table('account_locker')->where('user_id', $id)->get();
            $items = DB::table('account_locker')->where('user_id', $id)->count();
            $user_settings = DB::table('user_settings')->where('user_id', $id)->first();

            return view('account.account_locker',[
                'id' => $id,
                'account_locker' => $locker,
                'items' => $items,
                'user_settings' => $user_settings
            ]);
        }

        //Изменить никнейм
        public function locker_change_nickname(Request $request){

            $id = $request->id;
            $new_username = $request->new_username;

            DB::table('users')
            ->where('id', '=', $id)
            ->update([
                'name' => $new_username,
            ]);


            return back();
        }
        //Изменить бэкграунд
        public function locker_change_background(Request $request){

            $id = $request->id;
            $locker_background = $request->locker_background->store('public/storage/'.$id);


            DB::table('user_settings')
            ->where('user_id', '=', $id)
            ->update([
                'locker_background' => $locker_background,
            ]);


            return back();
        }
        //Изменить аватарку
        public function locker_change_profile_picture(Request $request){

            $id = $request->id;
            $profile_picture = $request->profile_picture->store('public/storage/'.$id.'/avatar');


            DB::table('user_settings')
            ->where('user_id', '=', $id)
            ->update([
                'profile_picture' => $profile_picture,
            ]);

            return back();
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
