<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Channel;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [

        'App\Thread' => 'App\Policies\ThreadPolicy',
    ];


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // \View::share('channels', Channel::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if($this->app->isLocal()){

        //     $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        // }
    }
}
