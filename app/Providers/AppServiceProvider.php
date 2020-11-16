<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
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
        $loaisanpham = DB::table('loaisanpham')->get();
        // $banner =DB::table('banner')->get();
        View::share('loaisanpham', $loaisanpham);
        // View::share('banner', $banner);
    }
}
