<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use Hash;
use DB;

class ChangePasswordController extends Controller
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
     * Создание правил валидации
     */
    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Пожалуйста, введите текущий пароль.',
            'password.required' => 'Пожалуйста введите пароль.',
            'password_confirmation.required' => 'Поле подтверждения пароля обязательно.',
            'password_confirmation.same' => 'Подтверждение пароля и пароль должны совпадать.',
            'password.min' => 'Пароль должен быть не менее 8 символов.',
            'password_confirmation.min' => 'Подтверждение пароля должно быть не менее 8 символов.',           
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password|min:8',
            'password_confirmation' => 'required|same:password|min:8',     
        ], $messages);

        return $validator;
    }


    /**
     * Изменение пароля
     */
    public function change_password(Request $request)
    {
        if(Auth::Check())
        {            
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            $user_id = Auth::User()->id;
            $user_settings = DB::table('user_settings')->where('user_id', $user_id)->first();
            if($validator->fails())
            {
                return view('account.account_settings', ['id' => $user_id, 'message' => '', 'pass_errors' => $validator->getMessageBag()->toArray(), 'user_settings' => $user_settings]);
            }
            else
            {  
                $current_password = Auth::User()->password;           
                if(Hash::check($request_data['current-password'], $current_password))
                {                                                     
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save(); 
                    return view('account.account_settings', ['id' => $user_id, 'message' => "Пароль успешно изменен !", 'user_settings' => $user_settings]);
                }
                else
                {           
                    $error = array('current-password' => 'Пожалуйста, введите правильный текущий пароль.');
                    return view('account.account_settings', ['id' => $user_id, 'message' => '', 'pass_error' => $error, 'user_settings' => $user_settings]);   
                }
            }        
        }
        else
        {
            return redirect()->to('/');
        }    
    }
}
