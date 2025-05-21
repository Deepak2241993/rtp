<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\HomeSliderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\HomeController;

use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\admin\TemImagesController;
use App\Http\Controllers\admin\TransactionsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\ProductListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductFaqsController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\QuoteRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\WebsiteSettingsController;
use App\Http\Controllers\StaticPageContentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontController::class, 'home'])->name('front.home');
Route::get('/terms-and-conditions', [FrontController::class, 'Terms'])->name('front.terms');
Route::get('/privacy-policy', [FrontController::class, 'privacy_policy'])->name('front.privacy-policy');
Route::get('/contact-us', [FrontController::class, 'contact_us'])->name('front.contact-us');
Route::post('/save-rating/{productId}', [FrontController::class, 'saveRating'])->name('front.saveRating');
Route::get('/request-a-quote', [FrontController::class, 'request_a_quote'])->name('front.request-a-quote');
Route::post('/add-to-wishlist',[FrontController::class,'addToWishlist'])->name('front.addToWishlist');

route::get('/db',[FrontController::class,'DBview'])->name('dbview');
route::post('/db-form',[FrontController::class,'DBPOST'])->name('db-form');

Route::get('/product/{productSlug}', [ProductListController::class, 'product'])->name('front.product');
// Route::get('/product-list/{categorySlug?}/{productslug?}', [ProductListController::class, 'index'])->name('front.product-list');
Route::get('/product-list/{categorySlug?}/{subcategorySlug?}/{productslug?}', [ProductListController::class, 'index'])->name('front.product-list');
Route::get('/product-search', [ProductListController::class, 'productlistAjax']);
Route::post('searchproduct', [ProductListController::class, 'searchProduct']);
Route::get('/get-price', [ProductListController::class, 'getPrice'])->name('front.getPrice');
Route::get('/fetch-price', [ProductListController::class, 'fetchPrice'])->name('front.fetchPrice');


Route::get('/cart', [CartController::class, 'cart'])->name('front.cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('front.addToCart');
Route::post('/buy-now', [CartController::class, 'buyNow'])->name('front.buyNow');
Route::get('/edit-cart-item/{rowId}', [CartController::class, 'editCartItem'])->name('front.edit');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('front.updateCart');
Route::post('/delete-item', [CartController::class, 'deleteItem'])->name('front.deleteItem.cart');

Route::get('/checkout', [CartController::class, 'checkout'])->name('front.checkout');

Route::post('/process-checkout', [CartController::class, 'processCheckout'])->name('front.processCheckout');
Route::get('/thanks/{order_id}', [CartController::class, 'thankyou'])->name('front.thankyou');

Route::post('/process-register', [AuthController::class, 'processRegister'])->name('account.processRegister');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('front.forgotPassword');
Route::post('/process-forgot-password', [AuthController::class, 'processForgotPassword'])->name('front.processForgotPassword');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('front.resetPassword');
Route::post('/process-reset-password', [AuthController::class, 'processResetPassword'])->name('front.processResetPassword');

// Route::post('/upload-files', 'FileUploadController@uploadFiles')->middleware('auth');
// Route::post('/upload-files', [App\Http\Controllers\FileUploadController::class, 'uploadFiles'])->middleware('auth');
Route::post('/upload-files', [App\Http\Controllers\FileUploadController::class, 'uploadFiles'])->name('upload.files')->middleware('auth');


Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/stripe', 'App\Http\Controllers\StripePaymentController@stripe')->name('stripe.index');
Route::get('stripe/checkout', 'App\Http\Controllers\StripePaymentController@stripeCheckout')->name('stripe.checkout');
// In routes/web.php
Route::post('stripe/create-checkout-session', [StripePaymentController::class, 'createCheckoutSession'])->name('stripe.createCheckoutSession');
// In routes/web.php
Route::get('stripe/success', [StripePaymentController::class, 'stripeSuccess'])->name('stripe.success');


Route::get('stripe/checkout/success', 'App\Http\Controllers\StripePaymentController@stripeCheckoutSuccess')->name('stripe.checkout.success');

Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
Route::get('/order-success', function () {
    return view('order.success');
})->name('order.success');
// web.php or api.php
Route::get('/check-auth', [AuthController::class, 'checkAuth'])->name('check.auth');


Route::post('/quote-request', [QuoteRequestController::class, 'store'])->name('quote.request.store');

  // Strip 
//   Route::post('/stripe', 'App\Http\Controllers\StripePaymentController@session')->name('session');
//   Route::controller(StripePaymentController::class)->group(function(){
//     Route::get('stripe','stripe')->name('stripe.index');
//     Route::get('stripe/checkout','stripeCheckout')->name('stripe.checkout');
//     Route::get('stripe/checkout/success','stripeCheckoutSuccess')->name('stripe.checkout.success');
// });



Route::group(['prefix' => 'account'], function () {

    Route::group(['middleware' => 'guest'], function () {

        Route::get('/login',[AuthController::class,'login'])->name('account.login');
        Route::post('/login',[AuthController::class,'authenticate'])->name('account.authenticate');
        Route::get('/register',[AuthController::class,'register'])->name('account.register');
        Route::post('/process-register',[AuthController::class,'processRegister'])->name('account.processRegister');
        

    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/profile',[AuthController::class,'profile'])->name('account.profile');
        Route::get('/logout',[AuthController::class,'logout'])->name('account.logout');
    });
});




Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        //Catogry Routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

        // Sub_Category Routes
        Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');
        Route::get('/sub-categories/create', [SubCategoryController::class, 'create'])->name('sub-categories.create');
        Route::post('/sub-categories', [SubCategoryController::class, 'store'])->name('sub-categories.store');
        Route::get('/sub-categories/{category}/edit', [SubCategoryController::class, 'edit'])->name('sub-categories.edit');
        Route::put('/sub-categories/{category}', [SubCategoryController::class, 'update'])->name('sub-categories.update');
        Route::delete('/sub-categories/{category}', [SubCategoryController::class, 'destroy'])->name('sub-categories.delete');

        // product Routes
        Route::get('/products',[ProductController::class,'index'])->name('products.index');
        Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/products',[ProductController::class,'store'])->name('products.store');
        Route::get('/products/{category}/edit',[ProductController::class,'edit'])->name('products.edit');
        Route::put('/products/{category}',[ProductController::class,'update'])->name('products.update');
        Route::delete('/products/{category}',[ProductController::class,'destroy'])->name('products.delete');
        Route::get('/get-products',[ProductController::class,'getProducts'])->name('products.getProducts');


        //Home Sliders
        Route::get('/home-slider', [HomeSliderController::class, 'index'])->name('home-slider.index');
        Route::get('/home-slider/create', [HomeSliderController::class, 'create'])->name('home-slider.create');
        Route::post('/home-slider', [HomeSliderController::class, 'store'])->name('home-slider.store');
        Route::get('/home-slider/{slider}/edit', [HomeSliderController::class, 'edit'])->name('home-slider.edit');
        Route::put('/home-slider/{slider}', [HomeSliderController::class, 'update'])->name('home-slider.update');
        Route::delete('/home-slider/{slider}', [HomeSliderController::class, 'destroy'])->name('home-slider.delete');
        //Home Page
        Route::get('/home-section', [HomeSliderController::class, 'indexSection'])->name('home-section.index');
        Route::get('/home-section/create', [HomeSliderController::class, 'createSection'])->name('home-section.create');
        Route::post('/home-section', [HomeSliderController::class, 'storeSection'])->name('home-section.store');
        Route::get('/home-section/{section}/edit', [HomeSliderController::class, 'editSection'])->name('home-section.edit');
        Route::put('/home-section/{section}', [HomeSliderController::class, 'updateSection'])->name('home-section.update');
        Route::delete('/home-section/{section}', [HomeSliderController::class, 'destroySection'])->name('home-section.delete');

        //Product FAQs
        Route::get('/product-faqs', [ProductFaqsController::class, 'index'])->name('product-faqs.index');
        Route::get('/product-faqs/create', [ProductFaqsController::class, 'create'])->name('product-faqs.create');
        Route::post('/product-faqs', [ProductFaqsController::class, 'store'])->name('product-faqs.store');
        Route::get('/product-faqs/{faqsId}/edit', [ProductFaqsController::class, 'edit'])->name('product-faqs.edit');
        Route::put('/product-faqs/{faqsId}', [ProductFaqsController::class, 'update'])->name('product-faqs.update');
        Route::delete('/product-faqs/{faqsId}', [ProductFaqsController::class, 'destroy'])->name('product-faqs.delete');

        // orders
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');
        // routes/web.php
        Route::post('/order/{order}/update-status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');



        Route::get('/products-subcategories', [ProductSubCategoryController::class, 'index'])->name('products-subcategories.index');

        Route::post('/product-images/update', [ProductImageController::class, 'update'])->name('product-images.update');
        Route::delete('/product-images', [ProductImageController::class, 'destroy'])->name('product-images.destroy');

        //trastion 

        Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/{id}', [OrderController::class, 'detail'])->name('transactions.detail');

        // Total Customers
        Route::get('/customers', [TransactionsController::class, 'customer'])->name('transactions.customer');
        Route::get('/customers/{id}', [TransactionsController::class, 'customerdetail'])->name('transactions.customerdetail');

        //temp-image.create

        Route::post('/upload-temp-image', [TemImagesController::class, 'create'])->name('temp-images.create');

        // Website Settings
        Route::get('/settings', [WebsiteSettingsController::class, 'edit'])->name('admin.settings');
        Route::post('/settings-update', [WebsiteSettingsController::class, 'update'])->name('admin.settings.update');





        // Static Pages
        Route::resource('/pages', StaticPageContentController::class);
       
        Route::get('/getslug', function (Request $request) {
            $slug = '';
            if (!empty($request->title)) {
                $slug = Str::slug($request->title);
            }
            return response()->json([
                'status' => true,
                'slug' => $slug
            ]);
        })->name('getslug');
    });
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::get('/routtee', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});
