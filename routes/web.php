<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Ruta principal (landing page)
Route::get('/', HomeController::class);

// Rutas de productos (públicas)
Route::prefix('product')->controller(ProductController::class)->group(function (){
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/store', 'store')->name('product.store');
    Route::get('/{producto}', 'show')->name('product.show');
});

// Rutas de administración
Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/products', 'products')->name('products');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/orders', 'orders')->name('orders');
    Route::get('/users', 'users')->name('users');
});