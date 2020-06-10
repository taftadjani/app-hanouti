<?php

namespace App\Providers;

use App\Category;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        //
        // view()->share('auth', Auth::user());
        view()->composer(['layouts.navigation'], function ($view) {
            $view->with('auth', Auth::user());
        });
        view()->composer(['layouts.shop-by-categories'], function ($view) {
            $view->with('categories', Category::all()->take(7));
        });
        view()->composer(['layouts.footer'], function ($view) {
            $view->with('auth', Auth::user());
        });
        Relation::morphMap([
            'author' => 'App\Author',
            'bill' => 'App\Bill',
            'brand' => 'App\Brand',
            'cart' => 'App\Cart',
            'cart_detail' => 'App\CartDetail',
            'category' => 'App\Category',
            'city' => 'App\City',
            'comment' => 'App\Comment',
            'company' => 'App\Company',
            'condition' => 'App\Condition',
            'country' => 'App\Country',
            'currency' => 'App\Currency',
            'delivery' => 'App\Delivery',
            'delivery_mode' => 'App\DeliveryMode',
            'discount' => 'App\Discount',
            'follow' => 'App\Follow',
            'language' => 'App\Language',
            'location' => 'App\Location',
            'message' => 'App\Message',
            'modele' => 'App\Modele',
            'newsletter' => 'App\Newsletter',
            'order' => 'App\Order',
            'order_detail' => 'App\OrderDetail',
            'payment' => 'App\Payment',
            'payment_method' => 'App\PaymentMethod',
            'post' => 'App\Post',
            'price' => 'App\Price',
            'privilege' => 'App\Privilege',
            'product' => 'App\Product',
            'product_store' => 'App\ProductStore',
            'provider' => 'App\Provider',
            'role' => 'App\Role',
            'seen' => 'App\Seen',
            'sign_in_out' => 'App\SignInOut',
            'star' => 'App\Star',
            'store' => 'App\Store',
            'sub_category' => 'App\SubCategory',
            'sub_comment' => 'App\SubComment',
            'unit' => 'App\Unit',
            'user' => 'App\User',
            'warning' => 'App\Warning',
            'warning_type' => 'App\WarningType',
        ]);
    }
}
