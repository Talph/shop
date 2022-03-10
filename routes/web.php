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

Route::get('/login', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
        // Product resource routes
        Route::resource('products', '\App\Http\Controllers\ProductController');
        // categories resource routes
        Route::resource('categories', '\App\Http\Controllers\CategoryController');
        // Variaions routes
        Route::get('/product/{id}/variants', [\App\Http\Controllers\VariantController::class, 'index'])->name('variants.index');
        Route::post('/product/{id}/variants', [\App\Http\Controllers\VariantController::class, 'store'])->name('variants.store');
        Route::get('/product/{id}/variants/{variant}', [\App\Http\Controllers\VariantController::class, 'edit'])->name('variants.edit');
        Route::post('/product/{id}/variants/{variant}', [\App\Http\Controllers\VariantController::class, 'update'])->name('variants.update');
        Route::post('/product/{id}/variants/{variant}/delete', [\App\Http\Controllers\VariantController::class, 'delete'])->name('variants.destroy');
});