<?php

namespace App\Providers;

use App\Author;
use App\Brand;
use App\Modele;
use App\Policies\AuthorPolicy;
use App\Policies\BrandPolicy;
use App\Policies\ModelePolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProductStorePolicy;
use App\Policies\StorePolicy;
use App\Product;
use App\ProductStore;
use App\Store;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class=>ProductPolicy::class,
        ProductStore::class=>ProductStorePolicy::class,
        Store::class=>StorePolicy::class,
        Brand::class=>BrandPolicy::class,
        Modele::class=>ModelePolicy::class,
        Author::class=>AuthorPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // My gates
        // Products
        // Gate::define('add-product',function ($user)
        // {
        //     return $user->haveAccess('add-product');
        // });
    }
}
