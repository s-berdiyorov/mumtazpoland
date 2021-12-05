<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Dashboard\CategoryController::class, 'index'])->name('category.index');
Route::resource('categories', \App\Http\Controllers\Dashboard\CategoryController::class);
