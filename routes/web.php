<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingCartController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductsController::class);
Route::middleware('auth')->group(function () {
    Route::prefix('/shopping-cart')->name('shopping-cart.')->group(function(){
        Route::get('/', [ShoppingCartController::class, 'index'])->name('index');
        Route::post('/', [ShoppingCartController::class, 'store'])->name('store');
        Route::delete('/{ShoppingCart}', [ShoppingCartController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('/payment')->name('payment.')->group(function(){
        Route::post('/', [PaymentController::class, 'pay'])->name('pay');
    });
});

require __DIR__.'/auth.php';
