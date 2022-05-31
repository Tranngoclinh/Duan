<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

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
    // dd(123);
    // return view('welcome');
})->middleware('auth');
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'adminlogin'])->name('adminlogin');
Route::prefix('customer')->group(function(){
    Route::get('/home',[CustomerController::class,'index'])->name('customers.index');
    Route::post('/create',[CustomerController::class,'store'])->name('customers.store');
    Route::get('/create',[CustomerController::class,'create'])->name('customers.create');
    Route::get('/edit/{id}',[CustomerController::class,'edit'])->name('customers.edit');
    Route::post('/edit/{id}',[CustomerController::class,'update'])->name('customers.update');
    Route::get('/destroy/{id}',[CustomerController::class,'destroy'])->name('customers.destroy');
    Route::get('/search', [CustomerController::class, 'search'])->name('customers.search');
    Route::get('/show/{id}',[CustomerController::class,'show'])->name('customers.show');
});
