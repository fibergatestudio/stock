<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AccountMessages;
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Рассылка сообщений зарегистрированным пользователям
     */
    public function send_message(Request $request)
    {
        $users = User::all();
        foreach ($users as $value) {
            $send_message = new AccountMessages();
            $send_message->user_id = $value->id;
            $send_message->from_user_id = $request->from_user_id;
            $send_message->message = $request->message;
            $send_message->date = $request->date;
            $send_message->theme = $request->theme;
            $send_message->status = 'sent';
            $send_message->save();
        }
        return view('admin.admin_users_table',[
            'id' => $request->from_user_id,
            'users' => $users,
            'sent_message' => 'Сообщение успешно отправлено !'
        ]);
    }

    //Админ - Таблица Юзеров
    public function admin_users_table($id){

        $users = DB::table('users')->get();


        return view('admin.admin_users_table',[
            'id' => $id,
            'users' => $users,
            'sent_message' => ''
        ]);
    }
    //Админ - Удалить Юзера
    public function admin_delete_user($id, $user_id){

        DB::table('users')->where('id', '=', $user_id)->delete();
        DB::table('user_settings')->where('id', '=', $user_id)->delete();

        return back();
    }

    //Админ - Изменить Роль
    public function admin_change_user_role($id, $user_id){


        $current_role = DB::table('users')->where('id', $user_id)->first();
        $role = $current_role->role;

        //dd($role, $id);

        if ($role == 'admin')
            DB::table('users')->where('id', '=', $user_id)
            ->update([
                'role' => 'user',
            ]);
        elseif ($role == 'user'){
            DB::table('users')->where('id', '=', $user_id)
            ->update([
                'role' => 'admin',
            ]);
        }

        return back();
    }

}
