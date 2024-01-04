<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::post('/products', [ProductController::class, 'store'])
    ->name('save-products');

Route::get('button1', function () {
    return view('button1');
});

Route::get('button22', [ProductController::class, 'index']);

Route::get('button3', function () {
    return view('button3');
});

Route::get('button4', function () {
    return view('button4');
});

Route::get('button2', [ProductController::class, 'index']);

Route::get('/cart/{productId}', [CartController::class, 'store']);
Route::get('/view-cart', [CartController::class, 'show'])->name('view-cart');
Route::get('/increase-quantity/{productId}', [CartController::class, 'increase']);
Route::get('/decrease-quantity/{productId}', [CartController::class, 'decrease']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::get('/view-orders', [OrderController::class, 'index'])->name('view-orders');

require __DIR__.'/auth.php';
