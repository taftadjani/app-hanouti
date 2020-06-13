<?php

use App\Cart;
use App\Category;
use App\Condition;
use App\Currency;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Mail\WelcomeMail;
use App\Modele;
use App\Price;
use App\Privilege;
use App\Product;
use App\ProductStore;
use App\Store;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// If your application doesn’t need registration,
// you may disable it by removing the newly created RegisterController
// and modifying your route declaration: Auth::routes(['register' => false]);
// Auth::routes(['register' => false]);


Route::get('/', "HomeController@index")->name('home');

Route::put('users/{id}', "ProfileController@delete")->name('users.delete');
Route::delete('users/{id}', "ProfileController@destroy")->name('users.destroy');

Route::post('subscription', function () {
    return "Store email in subscription";
})->name('subscribe');

Route::get('search-result', function () {

})->name('search-result');

// Profile
Route::get('profile', "ProfileController@index")->name('profile.index');
Route::get('profile/{id}/edit', "ProfileController@edit")->name('profile.edit');
Route::put('profile/{id}', "ProfileController@update")->name('profile.update');


// authors
Route::get('authors', "AuthorController@index")->name('authors.index');
Route::middleware('auth')->get("authors/create", "AuthorController@create")->name('authors.create');
Route::get("authors/{author}", "AuthorController@show")->name('authors.show');
Route::middleware('auth')->post('authors/store', "AuthorController@store")->name('authors.store');
Route::middleware('auth')->get('authors/{author}/edit', "AuthorController@edit")->name('authors.edit');
Route::middleware('auth')->put('authors/{author}', "AuthorController@update")->name('authors.update');
Route::middleware('auth')->delete('authors/{author}', "AuthorController@destroy")->name('authors.destroy');
Route::middleware('auth')->get('authors/{author}/restore', "AuthorController@restore")->name('authors.restore');

// bills
Route::get('bills', "BillController@index")->name('bills.index');
Route::middleware('auth')->get("bills/create", "BillController@create")->name('bills.create');
Route::get("bills/{bill}", "BillController@show")->name('bills.show');
Route::middleware('auth')->post('bills/store', "BillController@store")->name('bills.store');
Route::middleware('auth')->get('bills/{bill}/edit', "BillController@edit")->name('bills.edit');
Route::middleware('auth')->put('bills/{bill}', "BillController@update")->name('bills.update');
Route::middleware('auth')->delete('bills/{bill}', "BillController@destroy")->name('bills.destroy');
Route::middleware('auth')->get('bills/{bill}/restore', "BillController@restore")->name('bills.restore');

// brands
Route::get('brands', "BrandController@index")->name('brands.index');
Route::middleware('auth')->get("brands/create", "BrandController@create")->name('brands.create');
Route::get("brands/{brand}", "BrandController@show")->name('brands.show');
Route::middleware('auth')->post('brands/store', "BrandController@store")->name('brands.store');
Route::middleware('auth')->get('brands/{brand}/edit', "BrandController@edit")->name('brands.edit');
Route::middleware('auth')->put('brands/{brand}', "BrandController@update")->name('brands.update');
Route::middleware('auth')->delete('brands/{brand}', "BrandController@destroy")->name('brands.destroy');
Route::middleware('auth')->get('brands/{brand}/restore', "BrandController@restore")->name('brands.restore');

// Carts
Route::resource('carts', 'CartController')->names(
    [
        'index'=>'carts.index',
        'show'=>'carts.show',
    ]
);
Route::middleware('auth')->get('carts/create', "CartController@create")->name('carts.create');
Route::middleware('auth')->post('carts/store', "CartController@store")->name('carts.store');
Route::middleware('auth')->get('carts/{cart}/edit', "CartController@edit")->name('carts.edit');
Route::middleware('auth')->put('carts/{cart}', "CartController@update")->name('carts.update');
Route::middleware('auth')->delete('carts/{cart}', "CartController@destroy")->name('carts.destroy');
Route::middleware('auth')->get('carts/{cart}/restore', "CartController@restore")->name('carts.restore');
Route::middleware('auth')->get('carts/{cart}/clear', "CartController@clear")->name('carts.clear');
Route::middleware('auth')->get('carts/{cart}/order', "CartController@order")->name('carts.order');

// CartDetails
Route::resource('cartDetails', 'CartDetailController')->names(
    [
        'index'=>'cartDetails.index',
        'show'=>'cartDetails.show',
    ]
);
Route::middleware('auth')->get('cartDetails/create', "CartDetailController@create")->name('cartDetails.create');
Route::middleware('auth')->post('cartDetails/store', "CartDetailController@store")->name('cartDetails.store');
Route::middleware('auth')->get('cartDetails/{cartDetail}/edit', "CartDetailController@edit")->name('cartDetails.edit');
Route::middleware('auth')->put('cartDetails/{cartDetail}', "CartDetailController@update")->name('cartDetails.update');
Route::middleware('auth')->delete('cartDetails/{cartDetail}', "CartDetailController@destroy")->name('cartDetails.destroy');
Route::middleware('auth')->delete('cartDetails/{cart}/{id}', "CartDetailController@deleteFromProduct")->name('cartDetails.deleteFromProduct');
Route::middleware('auth')->get('cartDetails/{cartDetail}/restore', "CartDetailController@restore")->name('cartDetails.restore');
Route::middleware('auth')->put('cartDetails/{cartDetail}/quantity', "CartDetailController@updateQuantity")->name('cartDetails.update.quantity');

// Categories
Route::resource('categories', 'CategoryController')->names(
    [
        'index'=>'categories.index',
        'show'=>'categories.show',
    ]
);
Route::middleware('auth')->get('categories/create', "CategoryController@create")->name('categories.create');
Route::middleware('auth')->post('categories/store', "CategoryController@store")->name('categories.store');
Route::middleware('auth')->get('categories/{category}/edit', "CategoryController@edit")->name('categories.edit');
Route::middleware('auth')->put('categories/{category}', "CategoryController@update")->name('categories.update');
Route::middleware('auth')->delete('categories/{category}', "CategoryController@destroy")->name('categories.destroy');
Route::middleware('auth')->get('categories/{category}/restore', "CategoryController@restore")->name('categories.restore');

// City
Route::get('cities', "CityController@index")->name('cities.index');
Route::get('cities/show', "CityController@show")->name('cities.show');
Route::get('cities/create', "CityController@create")->middleware('auth')->name('cities.create');
Route::middleware('auth')->post('cities/store', "CityController@store")->name('cities.store');
Route::middleware('auth')->get('cities/{city}/edit', "CityController@edit")->name('cities.edit');
Route::middleware('auth')->put('cities/{city}', "CityController@update")->name('cities.update');
Route::middleware('auth')->delete('cities/{city}', "CityController@destroy")->name('cities.destroy');
Route::middleware('auth')->get('cities/{city}/restore', "CityController@restore")->name('cities.restore');

// comment
Route::get('comments', "CommentController@index")->name('comments.index');
Route::get('comments/show', "CommentController@show")->name('comments.show');
Route::get('comments/create', "CommentController@create")->middleware('auth')->name('comments.create');
Route::middleware('auth')->post('comments/store', "CommentController@store")->name('comments.store');
Route::middleware('auth')->get('comments/{comment}/edit', "CommentController@edit")->name('comments.edit');
Route::middleware('auth')->put('comments/{comment}', "CommentController@update")->name('comments.update');
Route::middleware('auth')->delete('comments/{comment}', "CommentController@destroy")->name('comments.destroy');
Route::middleware('auth')->get('comments/{comment}/restore', "CommentController@restore")->name('comments.restore');

// Company
Route::get('companies', "CompanyController@index")->name('companies.index');
Route::get('companies/show', "CompanyController@show")->name('companies.show');
Route::get('companies/create', "CompanyController@create")->middleware('auth')->name('companies.create');
Route::middleware('auth')->post('companies/store', "CompanyController@store")->name('companies.store');
Route::middleware('auth')->get('companies/{company}/edit', "CompanyController@edit")->name('companies.edit');
Route::middleware('auth')->put('companies/{company}', "CompanyController@update")->name('companies.update');
Route::middleware('auth')->delete('companies/{company}', "CompanyController@destroy")->name('companies.destroy');
Route::middleware('auth')->get('companies/{company}/restore', "CompanyController@restore")->name('companies.restore');

// Conditions
Route::resource('conditions', 'ConditionController')->names(
    [
        'index'=>'conditions.index',
        'show'=>'conditions.show',
    ]
);
Route::middleware('auth')->get('conditions/create', "ConditionController@create")->name('conditions.create');
Route::middleware('auth')->post('conditions/store', "ConditionController@store")->name('conditions.store');
Route::middleware('auth')->get('conditions/{condition}/edit', "ConditionController@edit")->name('conditions.edit');
Route::middleware('auth')->put('conditions/{condition}', "ConditionController@update")->name('conditions.update');
Route::middleware('auth')->delete('conditions/{condition}', "ConditionController@destroy")->name('conditions.destroy');
Route::middleware('auth')->get('conditions/{condition}/restore', "ConditionController@restore")->name('conditions.restore');

// countries
Route::resource('countries', 'CountryController')->names(
    [
        'index'=>'countries.index',
        'show'=>'countries.show',
    ]
);
Route::middleware('auth')->get('countries/create', "CountryController@create")->name('countries.create');
Route::middleware('auth')->post('countries/store', "CountryController@store")->name('countries.store');
Route::middleware('auth')->get('countries/{country}/edit', "CountryController@edit")->name('countries.edit');
Route::middleware('auth')->put('countries/{country}', "CountryController@update")->name('countries.update');
Route::middleware('auth')->delete('countries/{country}', "CountryController@destroy")->name('countries.destroy');
Route::middleware('auth')->get('countries/{country}/restore', "CountryController@restore")->name('countries.restore');

// Currencies
Route::resource('currencies', 'CurrencyController')->names(
    [
        'index'=>'currencies.index',
        'show'=>'currencies.show',
    ]
);
Route::middleware('auth')->get('currencies/create', "CurrencyController@create")->name('currencies.create');
Route::middleware('auth')->post('currencies/store', "CurrencyController@store")->name('currencies.store');
Route::middleware('auth')->get('currencies/{currency}/edit', "CurrencyController@edit")->name('currencies.edit');
Route::middleware('auth')->put('currencies/{currency}', "CurrencyController@update")->name('currencies.update');
Route::middleware('auth')->delete('currencies/{currency}', "CurrencyController@destroy")->name('currencies.destroy');
Route::middleware('auth')->get('currencies/{currency}/restore', "CurrencyController@restore")->name('currencies.restore');

// deliveries
Route::resource('deliveries', 'DeliveryController')->names(
    [
        'index'=>'deliveries.index',
        'show'=>'deliveries.show',
    ]
);
Route::middleware('auth')->get('deliveries/create', "DeliveryController@create")->name('deliveries.create');
Route::middleware('auth')->post('deliveries/store', "DeliveryController@store")->name('deliveries.store');
Route::middleware('auth')->get('deliveries/{delivery}/edit', "DeliveryController@edit")->name('deliveries.edit');
Route::middleware('auth')->put('deliveries/{delivery}', "DeliveryController@update")->name('deliveries.update');
Route::middleware('auth')->delete('deliveries/{delivery}', "DeliveryController@destroy")->name('deliveries.destroy');
Route::middleware('auth')->get('deliveries/{delivery}/restore', "DeliveryController@restore")->name('deliveries.restore');

// deliveryModes
Route::resource('deliveryModes', 'DeliveryModeController')->names(
    [
        'index'=>'deliveryModes.index',
        'show'=>'deliveryModes.show',
    ]
);
Route::middleware('auth')->get('deliveryModes/create', "DeliveryModeController@create")->name('deliveryModes.create');
Route::middleware('auth')->post('deliveryModes/store', "DeliveryModeController@store")->name('deliveryModes.store');
Route::middleware('auth')->get('deliveryModes/{deliveryMode}/edit', "DeliveryModeController@edit")->name('deliveryModes.edit');
Route::middleware('auth')->put('deliveryModes/{deliveryMode}', "DeliveryModeController@update")->name('deliveryModes.update');
Route::middleware('auth')->delete('deliveryModes/{deliveryMode}', "DeliveryModeController@destroy")->name('deliveryModes.destroy');
Route::middleware('auth')->get('deliveryModes/{deliveryMode}/restore', "DeliveryModeController@restore")->name('deliveryModes.restore');

// discounts
Route::resource('discounts', 'DiscountController')->names(
    [
        'index'=>'discounts.index',
        'show'=>'discounts.show',
    ]
);
Route::middleware('auth')->get('discounts/create', "DiscountController@create")->name('discounts.create');
Route::middleware('auth')->post('discounts/store', "DiscountController@store")->name('discounts.store');
Route::middleware('auth')->get('discounts/{discount}/edit', "DiscountController@edit")->name('discounts.edit');
Route::middleware('auth')->put('discounts/{discount}', "DiscountController@update")->name('discounts.update');
Route::middleware('auth')->delete('discounts/{discount}', "DiscountController@destroy")->name('discounts.destroy');
Route::middleware('auth')->get('discounts/{discount}/restore', "DiscountController@restore")->name('discounts.restore');

// follows
Route::resource('follows', 'FollowController')->names(
    [
        'index'=>'follows.index',
        'show'=>'follows.show',
    ]
);
Route::middleware('auth')->get('follows/create', "FollowController@create")->name('follows.create');
Route::middleware('auth')->post('follows/store', "FollowController@store")->name('follows.store');
Route::middleware('auth')->get('follows/{follow}/edit', "FollowController@edit")->name('follows.edit');
Route::middleware('auth')->put('follows/{follow}', "FollowController@update")->name('follows.update');
Route::middleware('auth')->delete('follows/{follow}', "FollowController@destroy")->name('follows.destroy');
Route::middleware('auth')->get('follows/{follow}/restore', "FollowController@restore")->name('follows.restore');

// languages
Route::resource('languages', 'LanguageController')->names(
    [
        'index'=>'languages.index',
        'show'=>'languages.show',
    ]
);
Route::middleware('auth')->get('languages/create', "LanguageController@create")->name('languages.create');
Route::middleware('auth')->post('languages/store', "LanguageController@store")->name('languages.store');
Route::middleware('auth')->get('languages/{language}/edit', "LanguageController@edit")->name('languages.edit');
Route::middleware('auth')->put('languages/{language}', "LanguageController@update")->name('languages.update');
Route::middleware('auth')->delete('languages/{language}', "LanguageController@destroy")->name('languages.destroy');
Route::middleware('auth')->get('languages/{language}/restore', "LanguageController@restore")->name('languages.restore');

// locations
Route::resource('locations', 'LocationController')->names(
    [
        'index'=>'locations.index',
        'show'=>'locations.show',
    ]
);
Route::middleware('auth')->get('locations/create', "LocationController@create")->name('locations.create');
Route::middleware('auth')->post('locations/store', "LocationController@store")->name('locations.store');
Route::middleware('auth')->get('locations/{location}/edit', "LocationController@edit")->name('locations.edit');
Route::middleware('auth')->put('locations/{location}', "LocationController@update")->name('locations.update');
Route::middleware('auth')->delete('locations/{location}', "LocationController@destroy")->name('locations.destroy');
Route::middleware('auth')->get('locations/{location}/restore', "LocationController@restore")->name('locations.restore');

// maps
Route::get('maps/stores', "MapController@index")->name('maps.stores');
Route::get('maps/{id}/map', "MapController@getStore")->name('maps.store');

// messages
Route::resource('messages', 'MessageController')->names(
    [
        'index'=>'messages.index',
        'show'=>'messages.show',
    ]
);
Route::middleware('auth')->get('messages/create', "MessageController@create")->name('messages.create');
Route::middleware('auth')->post('messages/store', "MessageController@store")->name('messages.store');
Route::middleware('auth')->get('messages/{message}/edit', "MessageController@edit")->name('messages.edit');
Route::middleware('auth')->put('messages/{message}', "MessageController@update")->name('messages.update');
Route::middleware('auth')->delete('messages/{message}', "MessageController@destroy")->name('messages.destroy');
Route::middleware('auth')->get('messages/{message}/restore', "MessageController@restore")->name('messages.restore');

// Modeles
Route::resource('modeles', 'ModeleController')->names(
    [
        'index'=>'modeles.index',
        'show'=>'modeles.show',
    ]
);
Route::middleware('auth')->get('modeles/create', "ModeleController@create")->name('modeles.create');
Route::middleware('auth')->post('modeles/store', "ModeleController@store")->name('modeles.store');
Route::middleware('auth')->get('modeles/{modele}/edit', "ModeleController@edit")->name('modeles.edit');
Route::middleware('auth')->put('modeles/{modele}', "ModeleController@update")->name('modeles.update');
Route::middleware('auth')->delete('modeles/{modele}', "ModeleController@destroy")->name('modeles.destroy');
Route::middleware('auth')->get('modeles/{modele}/restore', "ModeleController@restore")->name('modeles.restore');

// newsletters
Route::resource('newsletters', 'NewsletterController')->names(
    [
        'index'=>'newsletters.index',
        'show'=>'newsletters.show',
    ]
);
Route::middleware('auth')->get('newsletters/create', "NewsletterController@create")->name('newsletters.create');
Route::middleware('auth')->post('newsletters/store', "NewsletterController@store")->name('newsletters.store');
Route::middleware('auth')->get('newsletters/{newsletter}/edit', "NewsletterController@edit")->name('newsletters.edit');
Route::middleware('auth')->put('newsletters/{newsletter}', "NewsletterController@update")->name('newsletters.update');
Route::middleware('auth')->delete('newsletters/{newsletter}', "NewsletterController@destroy")->name('newsletters.destroy');
Route::middleware('auth')->get('newsletters/{newsletter}/restore', "NewsletterController@restore")->name('newsletters.restore');

// orders
Route::resource('orders', 'OrderController')->names(
    [
        'index'=>'orders.index',
        'show'=>'orders.show',
    ]
);
Route::middleware('auth')->get('orders/create', "OrderController@create")->name('orders.create');
Route::middleware('auth')->post('orders/store', "OrderController@store")->name('orders.store');
Route::middleware('auth')->get('orders/{order}/edit', "OrderController@edit")->name('orders.edit');
Route::middleware('auth')->put('orders/{order}', "OrderController@update")->name('orders.update');
Route::middleware('auth')->delete('orders/{order}', "OrderController@destroy")->name('orders.destroy');
Route::middleware('auth')->get('orders/{order}/restore', "OrderController@restore")->name('orders.restore');

// orderDetails
Route::resource('orderDetails', 'OrderDetailController')->names(
    [
        'index'=>'orderDetails.index',
        'show'=>'orderDetails.show',
    ]
);
Route::middleware('auth')->get('orderDetails/create', "OrderDetailController@create")->name('orderDetails.create');
Route::middleware('auth')->post('orderDetails/store', "OrderDetailController@store")->name('orderDetails.store');
Route::middleware('auth')->get('orderDetails/{orderDetail}/edit', "OrderDetailController@edit")->name('orderDetails.edit');
Route::middleware('auth')->put('orderDetails/{orderDetail}', "OrderDetailController@update")->name('orderDetails.update');
Route::middleware('auth')->delete('orderDetails/{orderDetail}', "OrderDetailController@destroy")->name('orderDetails.destroy');
Route::middleware('auth')->get('orderDetails/{orderDetail}/restore', "OrderDetailController@restore")->name('orderDetails.restore');

// payments
Route::resource('payments', 'PaymentController')->names(
    [
        'index'=>'payments.index',
        'show'=>'payments.show',
    ]
);
Route::middleware('auth')->get('payments/create', "PaymentController@create")->name('payments.create');
Route::middleware('auth')->post('payments/store', "PaymentController@store")->name('payments.store');
Route::middleware('auth')->get('payments/{payment}/edit', "PaymentController@edit")->name('payments.edit');
Route::middleware('auth')->put('payments/{payment}', "PaymentController@update")->name('payments.update');
Route::middleware('auth')->delete('payments/{payment}', "PaymentController@destroy")->name('payments.destroy');
Route::middleware('auth')->get('payments/{payment}/restore', "PaymentController@restore")->name('payments.restore');

// paymentMethods
Route::resource('paymentMethods', 'PostController')->names(
    [
        'index'=>'paymentMethods.index',
        'show'=>'paymentMethods.show',
    ]
);
Route::middleware('auth')->get('paymentMethods/create', "PostController@create")->name('paymentMethods.create');
Route::middleware('auth')->post('paymentMethods/store', "PostController@store")->name('paymentMethods.store');
Route::middleware('auth')->get('paymentMethods/{post}/edit', "PostController@edit")->name('paymentMethods.edit');
Route::middleware('auth')->put('paymentMethods/{post}', "PostController@update")->name('paymentMethods.update');
Route::middleware('auth')->delete('paymentMethods/{post}', "PostController@destroy")->name('paymentMethods.destroy');
Route::middleware('auth')->get('paymentMethods/{post}/restore', "PostController@restore")->name('paymentMethods.restore');

// posts
Route::resource('posts', 'PostController')->names(
    [
        'index'=>'posts.index',
        'show'=>'posts.show',
    ]
);
Route::middleware('auth')->get('posts/create', "PostController@create")->name('posts.create');
Route::middleware('auth')->post('posts/store', "PostController@store")->name('posts.store');
Route::middleware('auth')->get('posts/{post}/edit', "PostController@edit")->name('posts.edit');
Route::middleware('auth')->put('posts/{post}', "PostController@update")->name('posts.update');
Route::middleware('auth')->delete('posts/{post}', "PostController@destroy")->name('posts.destroy');
Route::middleware('auth')->get('posts/{post}/restore', "PostController@restore")->name('posts.restore');

// Products
Route::get('products/{id}/restore', "ProductController@restore")->name('products.restore');
Route::resource('products', 'ProductController')->names(
    [
        'index'=>'products.index',
        'create'=>'products.create',
        'show'=>'products.show',
        'edit'=>'products.edit',
        'store'=>'products.store',
        'update'=>'products.update',
        'delete'=>'products.destroy',
    ]
);

// Products store
Route::get('productStores', "ProductStoreController@index")->name('productStores.index');
Route::get('productStores/adminIndex', "ProductStoreController@adminIndex")->name('productStores.adminIndex');
Route::get('productStores/popularProducts', "ProductStoreController@popularProducts")->name('productStores.popularProducts');
Route::get('productStores/create', "ProductStoreController@create")->middleware('auth')->name('productStores.create');
Route::get('productStores/{productStore}', "ProductStoreController@show")->name('productStores.show');
Route::middleware('auth')->post('productStores/store', "ProductStoreController@store")->name('productStores.store');
Route::middleware('auth')->get('productStores/{productStore}/edit', "ProductStoreController@edit")->name('productStores.edit');
Route::middleware('auth')->put('productStores/{productStore}', "ProductStoreController@update")->name('productStores.update');
Route::middleware('auth')->delete('productStores/{productStore}', "ProductStoreController@destroy")->name('productStores.destroy');
Route::middleware('auth')->get('productStores/{productStore}/restore', "ProductStoreController@restore")->name('productStores.restore');

// Provider
Route::get('providers', "ProviderController@index")->name('providers.index');
Route::get('providers/{productStore}', "ProviderController@show")->name('providers.show');
Route::get('providers/create', "ProviderController@create")->middleware('auth')->name('providers.create');
Route::middleware('auth')->post('providers/store', "ProviderController@store")->name('providers.store');
Route::middleware('auth')->get('providers/{provider}/edit', "ProviderController@edit")->name('providers.edit');
Route::middleware('auth')->put('providers/{provider}', "ProviderController@update")->name('providers.update');
Route::middleware('auth')->delete('providers/{provider}', "ProviderController@destroy")->name('providers.destroy');
Route::middleware('auth')->get('providers/{provider}/restore', "ProviderController@restore")->name('providers.restore');

// Prices
Route::resource('prices', 'PriceController')->names(
    [
        'index'=>'prices.index',
        'show'=>'prices.show',
    ]
);
Route::middleware('auth')->get('prices/create', "PriceController@create")->name('prices.create');
Route::middleware('auth')->post('prices/store', "PriceController@store")->name('prices.store');
Route::middleware('auth')->get('prices/{price}/edit', "PriceController@edit")->name('prices.edit');
Route::middleware('auth')->put('prices/{price}', "PriceController@update")->name('prices.update');
Route::middleware('auth')->delete('prices/{price}', "PriceController@destroy")->name('prices.destroy');
Route::middleware('auth')->get('prices/{price}/restore', "PriceController@restore")->name('prices.restore');

// roles
Route::resource('roles', 'RoleController')->names(
    [
        'index'=>'roles.index',
        'show'=>'roles.show',
    ]
);
Route::middleware('auth')->get('roles/create', "RoleController@create")->name('roles.create');
Route::middleware('auth')->post('roles/store', "RoleController@store")->name('roles.store');
Route::middleware('auth')->get('roles/{role}/edit', "RoleController@edit")->name('roles.edit');
Route::middleware('auth')->put('roles/{role}', "RoleController@update")->name('roles.update');
Route::middleware('auth')->delete('roles/{role}', "RoleController@destroy")->name('roles.destroy');
Route::middleware('auth')->get('roles/{role}/restore', "RoleController@restore")->name('roles.restore');

// seens
Route::resource('seens', 'SeenController')->names(
    [
        'index'=>'seens.index',
        'show'=>'seens.show',
    ]
);
Route::middleware('auth')->get('seens/create', "SeenController@create")->name('seens.create');
Route::middleware('auth')->post('seens/store', "SeenController@store")->name('seens.store');
Route::middleware('auth')->get('seens/{seen}/edit', "SeenController@edit")->name('seens.edit');
Route::middleware('auth')->put('seens/{seen}', "SeenController@update")->name('seens.update');
Route::middleware('auth')->delete('seens/{seen}', "SeenController@destroy")->name('seens.destroy');
Route::middleware('auth')->get('seens/{seen}/restore', "SeenController@restore")->name('seens.restore');

// stars
Route::resource('stars', 'StarController')->names(
    [
        'index'=>'stars.index',
        'show'=>'stars.show',
    ]
);
Route::middleware('auth')->get('stars/create', "StarController@create")->name('stars.create');
Route::middleware('auth')->post('stars/store', "StarController@store")->name('stars.store');
Route::middleware('auth')->get('stars/{star}/edit', "StarController@edit")->name('stars.edit');
Route::middleware('auth')->put('stars/{star}', "StarController@update")->name('stars.update');
Route::middleware('auth')->delete('stars/{star}', "StarController@destroy")->name('stars.destroy');
Route::middleware('auth')->get('stars/{star}/restore', "StarController@restore")->name('stars.restore');

// Stores
Route::get('stores', "StoreController@index")->name('stores.index');
Route::get('stores/topStores', "StoreController@topStores")->name('stores.topStores');

Route::middleware('auth')->get("stores/create", "StoreController@create")->name('stores.create');
Route::get("stores/{store}", "StoreController@show")->name('stores.show');

Route::middleware('auth')->post('stores/store', "StoreController@store")->name('stores.store');
Route::middleware('auth')->get('stores/{store}/edit', "StoreController@edit")->name('stores.edit');
Route::middleware('auth')->put('stores/{store}', "StoreController@update")->name('stores.update');
Route::middleware('auth')->delete('stores/{store}', "StoreController@destroy")->name('stores.destroy');
Route::middleware('auth')->get('stores/{store}/restore', "StoreController@restore")->name('stores.restore');

// SubCategories
Route::resource('subCategories', 'SubCategoryController')->names(
    [
        'index'=>'subCategories.index',
        'show'=>'subCategories.show',
    ]
);
Route::middleware('auth')->get('subCategories/create', "SubCategoryController@create")->name('subCategories.create');
Route::middleware('auth')->post('subCategories/store', "SubCategoryController@store")->name('subCategories.store');
Route::middleware('auth')->get('subCategories/{subCategory}/edit', "SubCategoryController@edit")->name('subCategories.edit');
Route::middleware('auth')->put('subCategories/{subCategory}', "SubCategoryController@update")->name('subCategories.update');
Route::middleware('auth')->delete('subCategories/{subCategory}', "SubCategoryController@destroy")->name('subCategories.destroy');
Route::middleware('auth')->get('subCategories/{subCategory}/restore', "SubCategoryController@restore")->name('subCategories.restore');

// subComments
Route::resource('subComments', 'SubCommentController')->names(
    [
        'index'=>'subComments.index',
        'show'=>'subComments.show',
    ]
);
Route::middleware('auth')->get('subComments/create', "SubCommentController@create")->name('subComments.create');
Route::middleware('auth')->post('subComments/store', "SubCommentController@store")->name('subComments.store');
Route::middleware('auth')->get('subComments/{subComment}/edit', "SubCommentController@edit")->name('subComments.edit');
Route::middleware('auth')->put('subComments/{subComment}', "SubCommentController@update")->name('subComments.update');
Route::middleware('auth')->delete('subComments/{subComment}', "SubCommentController@destroy")->name('subComments.destroy');
Route::middleware('auth')->get('subComments/{subComment}/restore', "SubCommentController@restore")->name('subComments.restore');

// Units
Route::resource('units', 'UnitController')->names(
    [
        'index'=>'units.index',
        'show'=>'units.show',
    ]
);
Route::middleware('auth')->get('units/create', "UnitController@create")->name('units.create');
Route::middleware('auth')->post('units/store', "UnitController@store")->name('units.store');
Route::middleware('auth')->get('units/{unit}/edit', "UnitController@edit")->name('units.edit');
Route::middleware('auth')->put('units/{unit}', "UnitController@update")->name('units.update');
Route::middleware('auth')->delete('units/{unit}', "UnitController@destroy")->name('units.destroy');
Route::middleware('auth')->get('units/{unit}/restore', "UnitController@restore")->name('units.restore');

// warnings
Route::resource('warnings', 'WarningController')->names(
    [
        'index'=>'warnings.index',
        'show'=>'warnings.show',
    ]
);
Route::middleware('auth')->get('warnings/create', "WarningController@create")->name('warnings.create');
Route::middleware('auth')->post('warnings/store', "WarningController@store")->name('warnings.store');
Route::middleware('auth')->get('warnings/{warning}/edit', "WarningController@edit")->name('warnings.edit');
Route::middleware('auth')->put('warnings/{warning}', "WarningController@update")->name('warnings.update');
Route::middleware('auth')->delete('warnings/{warning}', "WarningController@destroy")->name('warnings.destroy');
Route::middleware('auth')->get('warnings/{warning}/restore', "WarningController@restore")->name('warnings.restore');

// warningTypes
Route::resource('warningTypes', 'WarningTypeController')->names(
    [
        'index'=>'warningTypes.index',
        'show'=>'warningTypes.show',
    ]
);
Route::middleware('auth')->get('warningTypes/create', "WarningTypeController@create")->name('warningTypes.create');
Route::middleware('auth')->post('warningTypes/store', "WarningTypeController@store")->name('warningTypes.store');
Route::middleware('auth')->get('warningTypes/{warningType}/edit', "WarningTypeController@edit")->name('warningTypes.edit');
Route::middleware('auth')->put('warningTypes/{warningType}', "WarningTypeController@update")->name('warningTypes.update');
Route::middleware('auth')->delete('warningTypes/{warningType}', "WarningTypeController@destroy")->name('warningTypes.destroy');
Route::middleware('auth')->get('warningTypes/{warningType}/restore', "WarningTypeController@restore")->name('warningTypes.restore');


// Test
Route::post('test', function (Request $request) {
    if ($request->has('category')) {
        foreach ($request['category'] as $cat) {
            echo $cat;
        }
    }
});
Route::get('test', function () {
    // $modele = Modele::where('id', 1)->first();
    // $product = Product::where('id', 1)->first();
    $productStore = ProductStore::where('id', 2)->first();
    // $product->modele()->sync($modele);
    // $productStore->modele()->sync($modele);
    // $store= Store::where('id',1)->first();
    // $user=User::where('id',2)->first();
    // $user->stores()->save($store);

    // $category = Category::where('id',1)->first();
    // $product->categories()->sync($category);

    // $subCategory = SubCategory::where('id',1)->first();
    // $productStore->subCategories()->sync($subCategory);

    // $condition = Condition::where('id',2)->first();
    // $condition->productStores()->save($productStore);

    // $price = Price::where('id',2)->first();
    // $user->prices()->attach($price);

    // $productStore->prices()->save($price);

    // $currency=Currency::where('id',2)->first();

    // $cart=Cart::where('id', 1)->first();

    // return $cart;
    // $user = Auth::user();
    // $permission_result =  $user->roles->first()->privileges->where("name",'index-stores');

    $store = Store::where('id', 12)->first();
    return $store->location==null;
});

Route::get('connected/user', function () {
    // return Auth::user()->role()->privileges;
    return Auth::user()->haveAccess('clear-cart');
})->middleware('auth');

// Users
Route::get('users/stores', "UserController@myStores");
Route::get('users/companies', "UserController@myCompanies");
Route::get('user/{id}', "UserController@becomeSeller")->name('user.become-seller');
