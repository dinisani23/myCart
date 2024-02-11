<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [ProductController::class, 'index']);
Route::get('products', [ProductController::class, 'index'])->name('products.list');

Route::get('cart', [CartController::class, 'index'])->name('cart.list');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/delete/{product_id}', [CartController::class, 'destroy'])->name('cart.delete');
Route::post('update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/checkout/{user_id}', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('order', [OrderController::class, 'index'])->name('order.list');
Route::get('/order/admin', [OrderController::class, 'orderList'])->name('order.listview');
Route::get('/order/admin/update/{order_id}', [OrderController::class, 'updateStatus'])->name('order.status');

Route::get('/admin/list', [AdminController::class, 'index'])->name('admin.list');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/create', [AdminController::class, 'registerAdmin'])->name('admin.create');
Route::get('/admin/edit/{user_id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{user_id}', [AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/delete/{user_id}', [AdminController::class, 'destroy'])->name('admin.delete');

//Route::get('app', [CartController::class, 'notification'])->name('cart.notification');

Route::get('stock', [ProductController::class, 'stock'])->name('stock.list');
Route::get('/stock/update/{product_id}', [ProductController::class, 'stock_update'])->name('stock.update');
Route::get('/stock/delete/{product_id}', [ProductController::class, 'destroy'])->name('stock.delete');
Route::post('/stock/edit/{product_id}', [ProductController::class, 'edit'])->name('stock.edit');
Route::get('/stock/new', [ProductController::class, 'addStock'])->name('stock.add');
Route::post('/stock/store', [ProductController::class, 'store'])->name('stock.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
