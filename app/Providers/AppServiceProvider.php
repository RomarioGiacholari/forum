<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        if (Schema::hasTable('channels')) {
            \View::share('channels', Channel::all());
        }    
        
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
