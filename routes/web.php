<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('top');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.create');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store']);
    Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::post('/blogs/{id}/delete', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blogs/{id}/edit', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/mypage/username', [UserController::class, 'editUserName'])->name('username.edit');
    Route::post('/mypage/username', [UserController::class, 'updateUserName'])->name('username.update');
    Route::get('/mypage/password', [UserController::class, 'editPassword'])->name('password.edit');
    Route::post('/mypage/password', [UserController::class, 'updatePassword'])->name('password.edit');
    Route::get('/category', [CategoryController::class, 'createCategory'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'storeCategory'])->name('category.store');
});