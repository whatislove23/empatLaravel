<?php

use App\Http\Controllers\ComentController;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', [Home::class, 'index'])->name("home");
Route::get('/products', [ProductsController::class, 'getProducts'])->name("products");
Route::get('/products/{id}', [ProductsController::class, 'getProductsByCategory'])->name("products.category");
Route::get('/product/{id}', [ProductsController::class, 'getProduct'])->name("product");
Route::post('/product/{id}/submit', [ComentController::class, "create"])->name('product.addFeedback');
Route::get('/add-product', [ProductsController::class, 'loadAddForm']);
Route::post('/add-product/submit', [ProductsController::class, "addProduct"])->name('products.addProduct');

;

