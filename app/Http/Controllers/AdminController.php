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

}
