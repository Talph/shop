<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('shop');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('shop', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('shop.index');
Route::get('shop/product/{id}/{product}', [App\Http\Controllers\Frontend\ProductController::class, 'show'])->name('shop.show');
Route::get('category/{id}/{category}', [App\Http\Controllers\Frontend\CategoryController::class, 'index'])->name('cat.show');

Route::group(['middleware' => ['auth']], function () {
        // Product resource routes
        Route::resource('products', '\App\Http\Controllers\ProductController');
        // categories resource routes
        Route::resource('categories', '\App\Http\Controllers\CategoryController');

        // Variaions routes
        Route::get('/product/{id}/variants', [\App\Http\Controllers\VariantController::class, 'index'])->name('variants.index');
        Route::post('/product/{id}/variants', [\App\Http\Controllers\VariantController::class, 'store'])->name('variants.store');
        Route::get('/product/{productid}/variants/{variantid}/edit', [\App\Http\Controllers\VariantController::class, 'edit'])->name('variants.edit');
        Route::put('/product/{productid}/variants/{variantid}', [\App\Http\Controllers\VariantController::class, 'update'])->name('variants.update');

        Route::delete('/variants/{variantid}/delete', [\App\Http\Controllers\VariantController::class, 'destroy'])->name('variants.destroy');

        Route::get('/products/category/{id}', [\App\Http\Controllers\CategoryController::class, 'categoryProducts']);
});