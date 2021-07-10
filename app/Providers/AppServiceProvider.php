<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GuzzleHttp\Client', function()
        {
            return  new Client([
                // Base URI is used with relative requests
                'verify' => false,
                'base_uri' => 'https://localhost:44376/api/',
                // You can set any number of default request options.
                'timeout'  => 9.0,
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
       // Schema::defaultStringLength(191);
    }
}
