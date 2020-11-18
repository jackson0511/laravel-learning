<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use View;
use Cart;

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
        $loaisanpham = DB::table('loaisanpham')->get();
        // $banner =DB::table('banner')->get();
        View::share('loaisanpham', $loaisanpham);
        // View::share('banner', $banner);
        view()->composer('*', function($view){
            $view->with('cart', Cart::getContent());
        });
    }
}
