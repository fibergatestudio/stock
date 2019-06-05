<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
    public function index_page(){

        if($user = Auth::user())
        {
            $id = Auth::user()->id;
        }
        else if(Auth::guest())
        {
            $id = 'null';
        }
        //dd($id);

        return view('index_page',[
            'id' => $id,
        ]);
    }

    public function account($id){



        return view('account.account_page',[
            'id' => $id,
        ]);
    }
}
