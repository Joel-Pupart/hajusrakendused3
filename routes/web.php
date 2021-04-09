<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', [PostsController::class, 'index']);
Route::post('/', [PostsController::class, 'store']);
Route::get('/create', [PostsController::class, 'create'])->middleware('auth');
Route::get('/edit/{post}', [PostsController::class, 'edit'])->middleware('auth');
Route::put('/edit/{post}', [PostsController::class, 'update'])->middleware('auth');
Route::delete('/delete/{post}', [PostsController::class, 'destroy'])->middleware('auth');
Route::get('/delete/{post}', [PostsController::class, 'index'])->middleware('auth');
Route::delete('/deletecomment/{comment}/{post}', [CommentsController::class, 'destroy'])->middleware('auth');
Route::get('/deletecomment/{comment}/{post}', [PostsController::class, 'index'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('/{post}', [CommentsController::class, 'store']);
Route::get('/{post}', [PostsController::class, 'show'])->name('posts.show');
