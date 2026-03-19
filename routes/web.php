<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartSessionController; // Cambiado a CartSessionController
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

// Rutas del carrito (SIN autenticación)
Route::prefix('cart')->name('cart.')->controller(CartSessionController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/add/{product}', 'add')->name('add');
    Route::put('/update/{cartItem}', 'update')->name('update');
    Route::delete('/remove/{cartItem}', 'remove')->name('remove');
    Route::post('/clear', 'clear')->name('clear');
    Route::get('/count', 'getCount')->name('count');
});

// Rutas de administración
Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/products', 'products')->name('products');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/categories/create', 'categoriesCreate')->name('categories.create');
    Route::post('/categories', 'categoriesStore')->name('categories.store');
    Route::get('/categories/{id}/edit', 'categoriesEdit')->name('categories.edit');
    Route::put('/categories/{id}', 'categoriesUpdate')->name('categories.update');
    Route::delete('/categories/{id}', 'categoriesDestroy')->name('categories.destroy');
    Route::get('/orders', 'orders')->name('orders');
    Route::get('/users', 'users')->name('users');
});