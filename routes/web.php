<?php


use App\Http\Controllers\CartManag;
use App\Http\Controllers\StockManag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartManagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockManagController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::controller(StockController::class)->group(function () {
    Route::get('/stock', 'index')->name("stock.index");
});
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::get('/cartadd/{id}', 'add')->name('cart.add');
    Route::get('/cartdelete/{menu}','delete')->name('cart.delete');
    Route::get('/cartremove/{menu}','remove')->name('cart.remove');
    Route::post('/cartstore','store')->name('cart.store');
    Route::get('/cartshow','show')->name('cart.show');
});
Route::controller(StockManagController::class)->group(function(){
    Route::get('/stockmanag','index')->name('stockmanag.index');
    Route::delete('/stockmanag/{id}','delete')->name('stockmanag.delete');
    Route::post('/stockmanag','store')->name('stockmanag.store');
});

Route::controller(CartManagController::class)->group(function(){
    Route::get('/cartmanag','index')->name('cartmanag.index');
    Route::delete('/cartmanag/{id}','delete')->name('cartmanag.delete');
});

require __DIR__.'/auth.php';
