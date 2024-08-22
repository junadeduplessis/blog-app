<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [HomeController::class, 'show'])->name('blog.show');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class);
    Route::get('/get-comments/{id}', [CommentController::class, 'getComments'])->name('get.commments');
    Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('post.like');
    Route::get('/likes/{id}', [LikeController::class, 'getLikes'])->name('get.likes');
});


