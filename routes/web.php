<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisterController;

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
    return view('welcome');
})->name('top');
Route::get('/blog', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store']);
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blogs/{id}/delete', [BlogController::class, 'destroy'])->name('blog.destroy');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blogs/{id}/edit', [BlogController::class, 'update'])->name('blog.update');
Route::get('/register', [RegisterController::class, 'index'])->name('register');