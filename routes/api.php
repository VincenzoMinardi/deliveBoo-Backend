<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataApiController;
use App\Http\Controllers\Api\Orders\OrderController;
use App\Http\Controllers\Api\TypeApiController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\RestaurantApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('types', [TypeApiController::class, 'index'])->name('api.types.index');
Route::get('restaurants', [RestaurantApiController::class, 'index'])->name('api.restaurants.index');
Route::get('restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('api.restaurants.show');
Route::get('data', [DataApiController::class, 'index'])->name('api.data.index');

Route::post('orders/makePayment', [OrderController::class, 'store'])->name('api.order.makePayment');