<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
   public function boot(): void
{
    View::composer('*', function ($view) {
        if (Auth::check()) {
            $restaurant = Auth::user()->restaurant;
        } else {
            $restaurant = null;
        }

        $view->with('restaurant', $restaurant);
    });
}
}
