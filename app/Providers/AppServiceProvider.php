<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Config;
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
        view()->composer('*', function ($view) {
            $dataConfig = Config::find(1);
            $cart_data = Cart::getContent();
            $count_cart = $cart_data->count();
            $cart_subtotal = Cart::getSubTotal();

            $view->with(['dataConfig' => $dataConfig, 'cart_data' => $cart_data, 'count_cart' => $count_cart ,'cart_subtotal' => $cart_subtotal]);
        });
    }
}
