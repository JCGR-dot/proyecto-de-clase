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
    // Dashboard
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    
    // Productos
    Route::get('/products', 'products')->name('products');
    
    // Categorías - CRUD completo
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/categories/create', 'categoriesCreate')->name('categories.create');
    Route::post('/categories', 'categoriesStore')->name('categories.store');
    Route::get('/categories/{id}/edit', 'categoriesEdit')->name('categories.edit');
    Route::put('/categories/{id}', 'categoriesUpdate')->name('categories.update');
    Route::delete('/categories/{id}', 'categoriesDestroy')->name('categories.destroy');
    
    // Pedidos
    Route::get('/orders', 'orders')->name('orders');
    
    // Usuarios
    Route::get('/users', 'users')->name('users');
});