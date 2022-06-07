<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Livewire\Component;
use App\Models\Ads;
use App\Models\FirstSlide;
use App\Models\SecondSlide;
use App\Models\TodaySlide;
use App\Models\ProductType;

use App\Http\Controllers\ProductController;
use App\Models\Product;

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

// Route::get('/', function () {
//     return view('site/details/eachProduct');
// });

Route::get('/', function () {
    $products = Product::all();
    $minSlider = Ads::latest()->orderBy('created_at')->paginate(3);
    $firstSlide = FirstSlide::latest()->orderBy('created_at')->paginate(3);
    $secondSlide = SecondSlide::latest()->orderBy('created_at')->paginate(3);
    $today_offers_slides = TodaySlide::latest()->orderBy('created_at')->paginate(3);
    $latestProducts      = ProductType::latest()->orderBy('created_at')->paginate(5);
    $allProdect          = ProductType::all();
    $abayaProducts =collect() ;
    $hijabProducts =collect() ;
    $bagsProducts =collect() ;

    foreach ($products as $abayaProduct) {
        if ($abayaProduct->name == 'عبايات رأس' ) {
            $abayaProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(10);
        }
    }
    foreach ($products as $abayaProduct) {
        if ($abayaProduct->name == 'حجابات' ) {
            $hijabProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(5);
        }
    }
    foreach ($products as $abayaProduct) {
        if ($abayaProduct->name == 'حقائب' ) {
            $bagsProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(5);
        }
    }
    return view('welcome', compact('abayaProducts','hijabProducts','bagsProducts','products', 'minSlider', 'firstSlide', 'secondSlide', 'today_offers_slides', 'latestProducts', 'allProdect'));
    });



Auth::routes();


/////////////// Home Route ////////////////////////////////////////////////////////////////
Route::get('home', 'HomeController@index')->name('home.index');
// Route::get('/', 'HomeController@welcome');


/////////////// Delivery Route ////////////////////////////////////////////////////////////////
Route::resource('deliveries', 'DeliveryController');


/////////////// offers Route ////////////////////////////////////////////////////////////////
Route::get('/offers/addOffers/{id}', 'OfferController@addOffers')->name('offers.addOffers');
Route::get('/offers/allOffers', 'OfferController@allOffers')->name('offers.allOffers');
Route::get('/offers/home', 'OfferController@home')->name('offers.home');
Route::post('/offers/save/{id}', 'OfferController@save')->name('offers.save');
Route::resource('offers', 'OfferController');


/////////////// ads Route ////////////////////////////////////////////////////////////////
Route::get('/ads/display/{id}', 'AdsController@display')->name('ads.display');
Route::get('/ads/hide/{id}', 'AdsController@hide')->name('ads.hide');
Route::resource('ads', 'AdsController');


/////////////// firstSlider Route ////////////////////////////////////////////////////////////////
Route::get('/firstSlider/display/{id}', 'FirstSlideController@display')->name('firstSlider.display');
Route::get('/firstSlider/hide/{id}', 'FirstSlideController@hide')->name('firstSlider.hide');
Route::resource('firstSlider', 'FirstSlideController');


/////////////// secondSlider Route ////////////////////////////////////////////////////////////////
Route::get('/secondSlider/display/{id}', 'SecondSlideController@display')->name('secondSlider.display');
Route::get('/secondSlider/hide/{id}', 'SecondSlideController@hide')->name('secondSlider.hide');
Route::resource('secondSlider', 'SecondSlideController');


/////////////// todaySlide Route ////////////////////////////////////////////////////////////////
Route::get('/todaySlide/display/{id}', 'TodaySlideController@display')->name('todaySlide.display');
Route::get('/todaySlide/hide/{id}', 'TodaySlideController@hide')->name('todaySlide.hide');
Route::resource('todaySlide', 'TodaySlideController');


/////////////// favorites Route ////////////////////////////////////////////////////////////////
Route::post('/favorites/save/{id}', 'FavoriteController@save')->name('favorites.save');
Route::resource('favorites', 'FavoriteController');



/////////////// pages Route /////////////////////////////////////////////////////////////////
Route::namespace('pages')->group(function() {
    Route::resource('pages', 'PageController');
});
Route::namespace('pages')->group(function() {
    Route::get('/contact_us/home', 'ContactUsController@home')->name('contact_us.home');
    Route::resource('contact_us', 'ContactUsController');
});
Route::namespace('pages')->group(function() {
    Route::get('/about_us/home', 'AboutUsController@home')->name('about_us.home');
    Route::resource('about_us', 'AboutUsController');


    Route::get('/help_Center/home', 'HelpCenterController@home')->name('help_Center.home');
    Route::resource('help_Center', 'HelpCenterController');


    Route::get('/shipping_and_return/home', 'ShippingAndReturnController@home')->name('shipping_and_return.home');
    Route::resource('shipping_and_return', 'ShippingAndReturnController');

    Route::get('/payment_Methods/home', 'PaymentMethodsController@home')->name('payment_Methods.home');
    Route::resource('payment_Methods', 'PaymentMethodsController');
});



/////////////// products Route /////////////////////////////////////////////////////////////////
Route::namespace('products')->group(function() {
    Route::resource('products', 'ProductController');
});

Route::namespace('products')->group(function() {
    // Route::post('/products_types/cpSearch', 'ProductTypeController@cpSearch')->name('products_types.cpSearch');
    Route::get('/products_types/latestProducts', 'ProductTypeController@latestProducts')->name('products_types.latestProducts');
    Route::get('/products_types/home', 'ProductTypeController@home')->name('products_types.home');
    Route::get('/products_types/mainPart/{id}', 'ProductTypeController@mainPart')->name('products_types.mainPart');
    Route::get('/products_types/orderBy/', 'ProductTypeController@orderBy')->name('products_types.orderBy');



    Route::post('/products_types/index', 'ProductTypeController@siteSearch')->name('products_types.siteSearch');

    Route::resource('products_types', 'ProductTypeController');
});

Route::namespace('products')->group(function() {
    Route::resource('colors', 'ColorController');
});

// Route::namespace('products')->group(function() {
//     Route::resource('prodect_colors', 'Prodect_colorsController');
// });

Route::namespace('products')->group(function() {
    Route::resource('fabrics', 'FabricController');
});

// Route::namespace('products')->group(function() {
//     Route::resource('prodect_fabrics', 'ProdectFabricsController');
// });

Route::namespace('products')->group(function() {
    Route::resource('sizes', 'SizeController');
});

// Route::namespace('products')->group(function() {
//     Route::resource('prodect_sizes', 'ProdectSizesController');
// });

Route::namespace('products')->group(function() {
    Route::resource('baskets', 'BasketController');
});

Route::namespace('products')->group(function() {
    Route::post('/orders/save', 'OrderController@save')->name('orders.save');
    Route::post('/orders/index', 'OrderController@cpSearch')->name('orders.cpSearch');
    Route::get('/orders/isRead/{id}', 'OrderController@isRead')->name('orders.isRead');
    Route::get('/orders/notRead/{id}', 'OrderController@notRead')->name('orders.notRead');
    Route::resource('orders', 'OrderController');
});



/////////////// users Route /////////////////////////////////////////////////////////////////
Route::namespace('users')->group(function() {
    Route::post('/comment/save/{id}', 'CommentController@save')->name('comment.save');
    Route::resource('comment', 'CommentController');
    // Route::resource('userInfo', 'UserInfoController');
});

Route::namespace('users')->group(function() {
    Route::get('/userInfo/confirm/{userInfoCity}/{orderId}', 'UserInfoController@confirm')->name('userInfo.confirm');
    // Route::get('/userInfo/confirm/{userInfo}', 'UserInfoController@confirm')->name('userInfo.confirm');

    Route::get('/userInfo/isConfirm/{id}', 'UserInfoController@isConfirm')->name('userInfo.isConfirm');

    Route::resource('userInfo', 'UserInfoController');
});

Route::namespace('users')->group(function() {
    Route::get('/users/admin/{id}', 'UserController@admin')->name('users.admin');
    Route::get('/users/notAdmin/{id}', 'UserController@notAdmin')->name('users.notAdmin');
    Route::get('/users/profile/', 'UserController@profile')->name('users.profile');
    Route::get('users.registration', [App\Http\Controllers\users\UserController::class, 'registration'])->name('users.register-user');
    Route::post('users.custom-registration', [App\Http\Controllers\users\UserController::class, 'customRegistration'])->name('users.custom');
    Route::resource('users', 'UserController');
});



/////////////// session Route /////////////////////////////////////////////////////////////////
Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');






/////////////// cart Route /////////////////////////////////////////////////////////////////
// Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::get('userInfo', [CartController::class, 'userInfo'])->name('userInfo');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


Route::get('/shop-component', function(){
return view('site.details.mainPart');
});
// Route::get('/product/{id}', ShopComponent::class);
// Route::get('/products_types/mainPart/{id}', ShopComponent::class);
