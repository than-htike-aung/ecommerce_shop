<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
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

    Route::middleware('auth:admin')->group(function (){
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
        Route::get('logout', [AdminUserController::class,'logout']);

    });


//Admin Login
    Route::get('/login', [AdminUserController::class,'index']);
    Route::post('/login', [AdminUserController::class,'store']);


});
