<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveForLaterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishListController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

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
//     return view('home');
// })->name('dashboard');

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/search', [LandingPageController::class, 'search'])->name('search');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{product:slug}', [ShopController::class, 'show'])->name('shop.show');


Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', [CartController::class, 'switchToSaveForLater'])->name('cart.saveForLater');


Route::delete('/saveForLater/{product}', [SaveForLaterController::class, 'destroy'])->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', [SaveForLaterController::class, 'switchToCart'])->name('saveForLater.switchToCart');


Route::post('/coupon', [CouponController::class, 'store'])->name('coupon.store');
Route::delete('/coupon', [CouponController::class, 'destroy'])->name('coupon.destroy');

Route::get('/wihslist', [WishListController::class, 'index'])->name('wishlist');
Route::post('/wihslist/{product}', [WishListController::class, 'store'])->name('wihslist.store');
Route::delete('/wihslist/{product}', [WishListController::class, 'destroy'])->name('wihslist.destroy');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/thankyou', [ConfirmationController::class, 'index']);

Route::get('/my-orders', [OrdersController::class, 'index'])->name('order');
Route::get('/my-orders/{order}', [OrdersController::class, 'show'])->name('order.show');


Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact/submit', [ContactUsController::class, 'submit'])->name('contact');

Route::get('empty', function(){
     Cart::destroy();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
