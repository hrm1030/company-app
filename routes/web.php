<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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
    return redirect()->route('home');
});

Route::prefix('auth')->group(function (){
   Route::get('login', [AuthController::class, 'login'])->name('auth.login');
   Route::post('signin', [AuthController::class, 'signin'])->name('auth.signin');
   Route::get('register', [AuthController::class, 'register'])->name('auth.register');
   Route::post('signup', [AuthController::class, 'signup'])->name('auth.signup');
   Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('/')->middleware('auth')->group(function() {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('search', [ItemController::class, 'search'])->name('search');
});

Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('list', [UserController::class, 'list'])->name('users.list');
    Route::get('edit', [UserController::class, 'edit'])->name('users.eidt');
    Route::post('save', [UserController::class, 'save'])->name('users.save');
    Route::post('delete', [UserController::class, 'delete']);
});

Route::prefix('category')->middleware('auth')->group(function () {
    Route::get('/', function() {
        return redirect()->route('category.list');
    });
    Route::get('list', [CategoryController::class, 'list'])->name('category.list');
    Route::post('save', [CategoryController::class, 'save']);
    Route::post('update', [CategoryController::class, 'update']);
    Route::post('delete', [CategoryController::class, 'delete']);
    Route::post('get_subcategories', [CategoryController::class, 'get_subcategories']);
    Route::post('get_category', [CategoryController::class, 'get_category']);
});

Route::prefix('item')->middleware('auth')->group(function() {
    Route::get('/', [ItemController::class, 'list'])->name('item.list');
    Route::post('get_categories_subcategories', [ItemController::class, 'get_categories_subcategories']);
    Route::post('save', [ItemController::class, 'save']);
    Route::post('update', [ItemController::class, 'update']);
    Route::post('delete', [ItemController::class, 'delete']);
    Route::post('get_item', [ItemController::class, 'get_item']);
    Route::post('review', [ItemController::class, 'review']);
});
