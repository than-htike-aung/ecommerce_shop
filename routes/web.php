<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\RegistrationController;
use App\Http\Controllers\Front\SaveLaterController;
use App\Http\Controllers\Front\SessionsController;
use App\Http\Controllers\Front\UserProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use Gloudemans\Shoppingcart\Facades\Cart;
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

/*
 * Admin Route
 *
 */

Route::prefix('admin')->group(function (){

//    Route::middleware('auth:admin')->group(function (){
        //Dashboard
        Route::get('/', [DashboardController::class, 'index']);

//Products
        Route::resource('/products', ProductController::class);

//Orders
        Route::resource('/orders', OrderController::class);

        Route::get('/confirm/{id}', [OrderController::class, 'confirm'])->name('order.confirm');
        Route::get('/pending/{id}', [OrderController::class, 'pending'])->name('order.pending');
        Route::get('/show/{id}', [OrderController::class, 'show'])->name('orders.show');


//Users
        Route::resource('/users', UsersController::class);
//Logout
        Route::get('/logout', [AdminUserController::class,'logout']);

//    });


//Admin Login
    Route::get('/login', [AdminUserController::class,'index'])->name('login');
    Route::post('/login', [AdminUserController::class,'store']);

});

//Front
Route::get('/', [HomeController::class,'index']);

//User Registration
Route::get('/user/register', [RegistrationController::class,'index']);
Route::post('/user/register', [RegistrationController::class, 'store']);


//Login
Route::get('/user/login', [SessionsController::class, 'index']);
Route::post('/user/login', [SessionsController::class, 'store']);

//Logout
Route::get('/user/logout', [SessionsController::class, 'logout']);

Route::get('/user/profile', [UserProfileController::class,'index']);

Route::get('/user/profile/{id}', [UserProfileController::class,'show'])->name('user.profile');

//Cart
Route::get('/cart', [CartController::class,'index']);
Route::post('/cart', [CartController::class, 'store'])->name('cart');
Route::delete('/cart/remove/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/saveLater/{product}', [CartController::class, 'saveLater'])->name('cart.saveLater');

Route::get('empty', function (){
  Cart::instance('default')->destroy();
});

// Save For Later
Route::delete('/saveLater/destroy/{product}', [SaveLaterController::class,'destroy'])->name('saveLater.destroy');
Route::post('/cart/moveToCart/{product}', [SaveLaterController::class, 'moveToCart'])->name('moveToCart');

//Checkout
Route::get('/checkout', [CheckoutController::class, 'index']);
