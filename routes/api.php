<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::apiResource('clients', 'ClientController');
Route::get('clients', [ClientController::class, 'index']);
Route::get('clients/{client}/show', [ClientController::class, 'show']);

//Route::apiResource('products', 'ClientController');
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}/show', [ProductController::class, 'show']);

Route::get('bookings', [BookingController::class, 'index']);
Route::post('bookings', [BookingController::class, 'store']);




