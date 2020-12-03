<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        // $all_categories = Category::where('publication_status', 1)->orderBy('id', 'DESC')->get();
        // View::share('all_categories', Category::where('publication_status', 1)->orderBy('id', 'DESC')->get());
        // View::share('CartGetContents', Cart::getContent());

        View::composer('*', function ($view) {
            $view->with('all_categories', Category::where('publication_status', 1)->orderBy('id', 'DESC')->get());
            $view->with('CartGetContents', Cart::getContent());
            $view->with('getTotalQuantity', Cart::getTotalQuantity());
            $view->with('getSubTotal', Cart::getSubTotal());
        });
    }
}
