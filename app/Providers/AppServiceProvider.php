<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Config;
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
        view()->composer('*', function ($view) {
            $dataConfig = Config::find(1);
            $view->with('dataConfig', $dataConfig);
        });
    }
}
