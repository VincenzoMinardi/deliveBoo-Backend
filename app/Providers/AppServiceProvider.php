<?php

namespace App\Providers;


use App\View\Components\bNav;
use App\View\Components\buttonNav;
use Braintree\Gateway;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::component('b-nav', bNav::class);
        $this->app->singleton(Gateway::class, function($app) {
            return new Gateway (
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'dgw5gmrqpqnxybbx',
                    'publicKey' => '65mxtxsqwh48ygdx',
                    'privateKey' => 'dcafa0756669534ffd6c3d83375040f0'
                ]
                );
        });
    }
}
