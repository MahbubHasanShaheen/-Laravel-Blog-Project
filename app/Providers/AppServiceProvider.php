<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
         $setting = \App\Models\Setting::first();
         Paginator::useBootstrap();
         View::share('recent_post_limit',\App\Models\Post::orderBy('id', 'desc')->limit($setting->recent_post_limit)->get());
         View::share('popular_post_limit',\App\Models\Post::orderBy('views', 'desc')->limit($setting->popular_post_limit)->get());
    }
}
