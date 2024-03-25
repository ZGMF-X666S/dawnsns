<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Auth;

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
        view()->composer('*', function ($view)
        {
            $follow_count = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();
    
            $follower_count = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();

            view()->share([
                'follow_count'=>$follow_count,
                'follower_count'=>$follower_count
            ]);
        });

    }
}
