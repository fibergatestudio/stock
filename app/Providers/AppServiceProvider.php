<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\UserSettings;
use Auth;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        View::composer('*', function($view)
        {
            if (Auth::check()){
                $user_settings = UserSettings::where('user_id',Auth::id() )->count();
                view()->share('user_settings', $user_settings);
            }
        });
        

        // view()->composer('*', function(View $view) {
        //     $user_settings = UserSettings::all();
        //     $view->with('user_settings', $user_settings);
        // });

        // $id = Auth::id();
        // dd($id);

        //$user_settings = UserSettings::where('user_id', '1')->first();


    }
}
