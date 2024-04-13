<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', [Home::class, 'index'])->name("home");
Route::get('/products', [ProductsController::class, 'getProducts'])->name("products");
Route::get('/product/{id}', [ProductsController::class, 'getProduct'])->name("product");
Route::get('/add-product', [ProductsController::class, 'loadAddForm']);
Route::post('/add-product/submit', [ProductsController::class, "addProduct"])->name('products.addProduct');

;

