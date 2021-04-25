<?php

use App\Http\Controllers\Api\CategoryApi;
use App\Http\Controllers\Api\CategoryWiseDuahApi;
use App\Http\Controllers\Api\DuahApi;
use App\Http\Controllers\Api\DuahDetailsApi;
use Illuminate\Http\Request;
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

Route::get("category/{slug}", CategoryWiseDuahApi::class);
Route::get("category", CategoryApi::class);
Route::get("dua/{slug}", DuahDetailsApi::class);
Route::get("dua", DuahApi::class);
Route::get("/", function () {
    return view('Api_Doc');
});
