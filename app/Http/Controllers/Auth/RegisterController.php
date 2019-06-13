<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserSettings;
use App\AccountWallet;
use App\AccountLikes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Input;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //return $this->create_user_settings($data);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user_settings = new UserSettings();
        if (isset($data['ref_id'])) {
            $user_settings->ref_id = $data['ref_id'];
        }       
        $user_settings->user_id = $user->id;
        $user_settings->save();

        $user_wallet = new AccountWallet();
        $user_wallet->user_id = $user->id;
        $user_wallet->save();

        $user_likes = new AccountLikes();
        $user_likes->user_id = $user->id;
        $user_likes->save();

        return $user;
    }

    // public function create_user_settings($data){

    //     $user_settings = new UserSettings();
    //     $user_settings->user_id = $data->save()->id;
    //     $user_settings->save();

    // }
}
