<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        //View::share('cart_notification', $notification);
        $cart_notif = new CartController();
        View::share('cart_notif', $cart_notif);
        //View::share('notification', $cart_notif->notification());
        /*View::composer('app', function ($view) {
            $data = CartController::notification(); 
            $view->with('notification', $data);
        });*/
    }
}
