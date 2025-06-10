<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/create', [ProductController::class, 'store'])->name('products.store');

Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('products/{product}/edit', [ProductController::class, 'update'])->name('products.update');

Route::get('products/{product}/materials', [ProductController::class, 'materials'])->name('products.materials');

