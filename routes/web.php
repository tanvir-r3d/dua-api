<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Duahcontroller;
use App\Http\Controllers\SubcategoryController;
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

Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/category');
    Route::resource('category', CategoryController::class);
    Route::get("/category/status/{id}", [CategoryController::class, 'status']);
    Route::resource('subcategory', SubcategoryController::class);
    Route::get("/subcategory/status/{id}", [SubcategoryController::class, 'status']);
    Route::resource('dua', Duahcontroller::class);
    Route::get('/dua/status/{id}', [Duahcontroller::class, 'status']);
});
