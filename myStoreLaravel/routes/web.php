<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;



//Route::resource('products', ProductController::class);
//Route::resource('users', UserController::class);



Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/product/{slug}', [SiteController::class, 'details'])->name('details');
Route::get('category/{id}', [SiteController::class, 'category'])->name('category');
Route::get('/cart', [CartController::class, 'cartList'])->name('cart');
Route::post('/cart', [CartController::class, 'addCart'])->name('addcart');
Route::post('/remove', [CartController::class, 'removeCart'])->name('removecart');
Route::post('/update', [CartController::class, 'updateCart'])->name('updatecart');
Route::get('/clear', [CartController::class, 'clearCart'])->name('clearcart');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkemail']);
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');

