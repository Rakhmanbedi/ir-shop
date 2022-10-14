<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
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
    return redirect()->route('product.index');
});

Route::middleware('auth')->group(function (){
    Route::resource('product', ProductController::class)->except('index','show');
    Route::post('/logout', [LoginController::class,'logout'])->name('logout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class)->only('index', 'show');

Route::get('/product/category/{category}' ,[ProductController::class,'productsByCategory'])->name('product.category');

Route::get('/register',[RegisterController::class, 'create'])->name('register.form');
Route::post('/register',[RegisterController::class, 'register'])->name('register');

Route::get('/login',[LoginController::class, 'create'])->name('login.form');
Route::post('/login',[LoginController::class, 'login'])->name('login');




//Route::get('/product/index', [ProductController::class, 'index'])->name('index');
//Route::get('/product/create', [ProductController::class, 'create'])->name('create');