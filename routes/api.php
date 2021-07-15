<?php

use App\Http\Controllers\Api\CategoryApi;
use App\Http\Controllers\Api\CategoryWiseDuahApi;
use App\Http\Controllers\Api\CategoryWiseSubcategoryApi;
use App\Http\Controllers\Api\DuahApi;
use App\Http\Controllers\Api\DuahDetailsApi;
use App\Http\Controllers\Api\SubcategoryApi;
use App\Http\Controllers\Api\SubcategoryWiseDuahApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("category/subcategory/{id}", CategoryWiseSubcategoryApi::class);
Route::get("category", CategoryApi::class);
Route::get("category/{slug}", CategoryWiseDuahApi::class);
Route::get("subcategory", SubcategoryApi::class);
Route::get("subcategory/{slug}", SubcategoryWiseDuahApi::class);
Route::get("dua/{slug}", DuahDetailsApi::class);
Route::get("dua", DuahApi::class);
Route::get("/", function () {
    return view('Api_Doc');
});
