<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use \UniSharp\LaravelFilemanager\Lfm;

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

// CACHE CLEAR ROUTE
Route::get('cache-clear', function () {
    Artisan::call('optimize:clear');
    request()->session()->flash('success', 'Successfully cache cleared.');
    return redirect()->back();
})->name('cache.clear');


// STORAGE LINKED ROUTE
Route::get('storage-link', [AdminController::class, 'storageLink'])->name('storage.link');


Auth::routes(['register' => false]);

Route::get('user/auth', [FrontendController::class, 'login'])->name('login.form')->middleware('guest');
Route::post('user/auth', [FrontendController::class, 'loginSubmit'])->name('login.submit')->middleware('guest');
Route::get('user/logout', [FrontendController::class, 'logout'])->name('user.logout')->middleware('guest');

// Route::get('user/register', [FrontendController::class, 'register'])->name('register.form')->middleware('guest');
Route::post('user/register', [FrontendController::class, 'registerSubmit'])->name('register.submit')->middleware('guest');
// Reset password
Route::get('password-reset', [FrontendController::class, 'showResetForm'])->name('password.reset')->middleware('guest');
// Socialite
Route::get('login/{provider}/', [LoginController::class, 'redirect'])->name('login.redirect')->middleware('guest');
Route::get('login/{provider}/callback/', [LoginController::class, 'Callback'])->name('login.callback');

Route::get('/', [FrontendController::class, 'home'])->name('home');

// Frontend Routes
Route::get('/home', [FrontendController::class, 'index']);
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [FrontendController::class, 'privacy'])->name('privacy');
Route::post('/contact/message', [MessageController::class, 'store'])->name('contact.store');
Route::get('product/{slug}', [FrontendController::class, 'productDetail'])->name('product-detail');
Route::post('/product/search', [FrontendController::class, 'productSearch'])->name('product.search');
Route::get('/product/category/{slug}', [FrontendController::class, 'productCat'])->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}', [FrontendController::class, 'productSubCat'])->name('product-sub-cat');
Route::get('/product-brand/{slug}', [FrontendController::class, 'productBrand'])->name('product-brand');
// Cart section
Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('user');
Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('user');
// Route::post('/add-to-cart-ajax', [CartController::class, 'singleAddToCartAjax'])->middleware('user');
Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clear-cart');
Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');

Route::get('/cart', function () {
    return view('frontend.pages.cart');
})->name('cart')->middleware('user');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('user');
// Wishlist
Route::get('/wishlist', function () {
    return view('frontend.pages.wishlist');
})->name('wishlist');
Route::get('/wishlist/{slug}', [WishlistController::class, 'wishlist'])->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}', [WishlistController::class, 'wishlistDelete'])->name('wishlist-delete');
Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');
Route::get('order/pdf/{id}', [OrderController::class, 'pdf'])->name('order.pdf');
Route::get('/income', [OrderController::class, 'incomeChart'])->name('product.order.income');
// Route::get('/user/chart',[AdminController::class, 'userPieChart'])->name('user.piechart');
Route::get('/shop', [FrontendController::class, 'shop'])->name('product-grids');
// Route::get('/product-lists', [FrontendController::class, 'productLists'])->name('product-lists');
Route::match(['get', 'post'], '/filter', [FrontendController::class, 'productFilter'])->name('shop.filter');
// Order Track
Route::get('/product/track', [OrderController::class, 'orderTrack'])->name('order.track');
Route::post('product/track/order', [OrderController::class, 'productTrackOrder'])->name('product.track.order');
// Blog
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/search', [FrontendController::class, 'blogSearch'])->name('blog.search');
Route::post('/blog/filter', [FrontendController::class, 'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}', [FrontendController::class, 'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}', [FrontendController::class, 'blogByTag'])->name('blog.tag');

// NewsLetter
Route::post('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');

// Product Review
Route::resource('/review', 'ProductReviewController');
Route::post('product/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');

// Post Comment
Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post-comment.store');
Route::resource('/comment', 'PostCommentController');
// Coupon
Route::post('/coupon-store', [CouponController::class, 'couponStore'])->name('coupon-store');
// Payment
Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');

Route::get('/pay/{id}', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/credit-pay/{creditHistory}', [App\Http\Controllers\PaymentController::class, 'creditPay'])->name('credit-pay');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');



// Backend section start

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/file-manager', function () {
        return view('backend.layouts.file-manager');
    })->name('file-manager');
    // user route
    Route::resource('users', 'UsersController');
    // Banner
    Route::resource('banner', 'BannerController');
    // Brand
    Route::resource('brand', 'BrandController');
    // Profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
    Route::post('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');
    // Category
    Route::resource('/category', 'CategoryController');
    // Product
    Route::resource('/product', 'ProductController');
    // Ajax for sub category
    Route::post('/category/{id}/child', 'CategoryController@getChildByParent');
    // POST category
    Route::resource('/post-category', 'PostCategoryController');
    // Post tag
    Route::resource('/post-tag', 'PostTagController');
    // Post
    Route::resource('/post', 'PostController');
    // Message
    Route::resource('/message', 'MessageController');
    Route::get('/message/five', [MessageController::class, 'messageFive'])->name('messages.five');

    // Order
    Route::resource('/order', 'OrderController');
    // Shipping
    Route::resource('/shipping', 'ShippingController');
    // Coupon
    Route::resource('/coupon', 'CouponController');
    // Settings
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('setting/update', [AdminController::class, 'settingsUpdate'])->name('settings.update');

    // Notification
    Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('admin.notification');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('all.notification');
    Route::delete('/notification/{id}', [NotificationController::class, 'delete'])->name('notification.delete');
    // Password Change
    Route::get('change-password', [AdminController::class, 'changePassword'])->name('change.password.form');
    Route::post('change-password', [AdminController::class, 'changPasswordStore'])->name('change.password');
});


// User section start
Route::group(['prefix' => '/user', 'middleware' => ['user']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('user');
    // Profile
    Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
    Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');
    //  Order
    Route::get('/order', "HomeController@orderIndex")->name('user.order.index');
    Route::get('/order/show/{id}', "HomeController@orderShow")->name('user.order.show');
    Route::delete('/order/delete/{id}', [HomeController::class, 'userOrderDelete'])->name('user.order.delete');
    // Product Review
    Route::get('/user-review', [HomeController::class, 'productReviewIndex'])->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}', [HomeController::class, 'productReviewDelete'])->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}', [HomeController::class, 'productReviewEdit'])->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}', [HomeController::class, 'productReviewUpdate'])->name('user.productreview.update');

    // Post comment
    Route::get('user-post/comment', [HomeController::class, 'userComment'])->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}', [HomeController::class, 'userCommentDelete'])->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}', [HomeController::class, 'userCommentEdit'])->name('user.post-comment.edit');
    Route::patch('user-post/comment/update/{id}', [HomeController::class, 'userCommentUpdate'])->name('user.post-comment.update');

    // Password Change
    Route::get('change-password', [HomeController::class, 'changePassword'])->name('user.change.password.form');
    Route::post('change-password', [HomeController::class, 'changPasswordStore'])->name('change.password');

    Route::get('/become-a-distributor/process', [HomeController::class, 'distributorOnboardingProcess'])->name('distributor.onboarding.process');
    Route::get('/become-a-sales-person/process', [HomeController::class, 'salesPersonOnboardingProcess'])->name('salesPerson.onboarding.process');
    Route::post('/become-a-sales-person/process', [HomeController::class, 'salesPersonOnboardingRegister'])->name('salesPerson.onboarding.reg');
});
Route::get('/become-a-distributor', function() {
    return view('user.distributor-onboarding');
})->name('distributor.onboarding');

// Distributor section start
Route::group(['prefix' => '/user/distributor', 'as' => 'distributor.' , 'middleware' => ['auth', 'distributor']], function () {
    Route::get('/', [DistributorController::class, 'index'])->name('home');
// 
    

    Route::get('/products', [DistributorController::class, 'products'])->name('products');
    Route::post('/products', [DistributorController::class, 'makeOrder'])->name('products.make-order');
    Route::get('/credit-history', [DistributorController::class, 'creditHistory'])->name('credit-history');
    Route::get('/transactions', [DistributorController::class, 'transactions'])->name('transactions');
    // Profile
    Route::get('/settings', [DistributorController::class, 'settings'])->name('distributor-settings');
    Route::post('/settings', [DistributorController::class, 'settingsUpdate'])->name('distributor-settings-update');
    Route::post('/settings/closeAccount', [DistributorController::class, 'closeAccount'])->name('distributor-settings-close-account');
    //  Order
    Route::get('/order', "DistributorController@orderIndex")->name('distributor.order.index');
    Route::get('/order/show/{id}', "DistributorController@orderShow")->name('distributor.order.show');
    Route::delete('/order/delete/{id}', [DistributorController::class, 'distributorOrderDelete'])->name('distributor.order.delete');
    // Product Review
    Route::get('/distributor-review', [DistributorController::class, 'productReviewIndex'])->name('distributor.productreview.index');
    Route::delete('/distributor-review/delete/{id}', [DistributorController::class, 'productReviewDelete'])->name('distributor.productreview.delete');
    Route::get('/distributor-review/edit/{id}', [DistributorController::class, 'productReviewEdit'])->name('distributor.productreview.edit');
    Route::patch('/distributor-review/update/{id}', [DistributorController::class, 'productReviewUpdate'])->name('distributor.productreview.update');

    // Post comment
    Route::get('distributor-post/comment', [DistributorController::class, 'distributorComment'])->name('distributor.post-comment.index');
    Route::delete('distributor-post/comment/delete/{id}', [DistributorController::class, 'distributorCommentDelete'])->name('distributor.post-comment.delete');
    Route::get('distributor-post/comment/edit/{id}', [DistributorController::class, 'distributorCommentEdit'])->name('distributor.post-comment.edit');
    Route::patch('distributor-post/comment/udpate/{id}', [DistributorController::class, 'distributorCommentUpdate'])->name('distributor.post-comment.update');

    // Password Change
    Route::get('change-password', [DistributorController::class, 'changePassword'])->name('distributor.change.password.form');
    Route::post('change-password', [DistributorController::class, 'changPasswordStore'])->name('change.password');

    // Referrals
    Route::get('/referral-earnings', [DistributorController::class, 'referralEarnings'])->name('referral.earnings');
    Route::get('/referrals', [DistributorController::class, 'referrals'])->name('referrals');
});


// The route that the button calls to initialize payment
// Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
// Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');
// Route::post('/webhook/flutterwave', [FlutterwaveController::class, 'webhook'])->name('webhook');
Route::get('/payment-cron', [PaymentController::class, 'handleDailyTransfer'])->name('payment-cron');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
