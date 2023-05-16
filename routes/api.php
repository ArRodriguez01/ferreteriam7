<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Api\StockController;


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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::controller(CartController::class)->group(function(){
    Route::get('/carts','index');
    Route::post('/carts','store');
    Route::get('/carts/{id}','filter');
    Route::get('/carts/{cart}','show');
    Route::delete('/carts/{id}','delete');
    Route::put('/carts/{id}','update');
});
Route::resource('stocks',StockController::class)->middleware(['auth:sanctum']);

