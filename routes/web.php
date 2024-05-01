<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/Products',[ProductsController::class, 'index'])->name('Products.index');
Route::post('/Products',[ProductsController::class, 'store'])->name('Products.store');
Route::get('/Products/create', [ProductsController::class, 'create'])->name('Products.create');