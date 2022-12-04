<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\AddCategoryController;
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
    Route::resource('comments', CommentController::class )->only('store','destroy');
    Route::post('/product/{product}/rate',[ProductController::class,'rate'])->name('products.rate');
    Route::post('/product/{product}/unrate',[ProductController::class,'unrate'])->name('products.unrate');
    Route::post('/product/{product}/basketall',[ProductController::class, 'basketAll'])->name('products.basketAll');
    Route::get('/product/basket',[ProductController::class, 'basket'])->name('products.basket');
    Route::post('/product/{product}/unbasket',[ProductController::class,'unbasketAll'])->name('products.unbasketAll');
    Route::get('/product/basket/{product}/edit', [ProductController::class,'editbasket'])->name('products.editBasket');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,moderator')->group(function (){
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
        Route::get('/users/commentaries', [UserController::class, 'comment'])->name('users.commentaries');
        Route::get('/users/addcategory', [AddCategoryController::class,'addcategory'])->name('users.addcategory');
        Route::get('/users/addcategoryname',[AddCategoryController::class,'addname'])->name('users.addcategoryname');
        Route::get('/categories/create',[AddCategoryController::class,'create'])->name('categories.create');
        Route::post('/categories/store',[AddCategoryController::class,'store'])->name('categories.store');
        Route::get('/categories/{category}',[AddCategoryController::class,'delete'])->name('categories.delete');
        Route::post('/users/logout', [LoginController::class,'logout'])->name('logout');
    });
});
Route::get('/search', [ProductController::class, 'index'])->name('search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class)->only('index', 'show');

Route::get('/product/category/{category}' ,[ProductController::class,'productsByCategory'])->name('product.category');

Route::get('/register',[RegisterController::class, 'create'])->name('register.form');
Route::post('/register',[RegisterController::class, 'register'])->name('register');

Route::get('/login',[LoginController::class, 'create'])->name('login.form');
Route::post('/login',[LoginController::class, 'login'])->name('login');




//Route::get('/product/index', [ProductController::class, 'index'])->name('index');
//Route::get('/product/create', [ProductController::class, 'create'])->name('create');
