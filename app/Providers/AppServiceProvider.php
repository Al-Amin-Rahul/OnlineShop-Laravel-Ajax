<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use Cart;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);

        if (Schema::hasTable("categories")) {
            $categories = Category::where('publication_status',1)->orderBy("id", "desc")->get();
            View::share('categories',$categories);
        }
    }
}
