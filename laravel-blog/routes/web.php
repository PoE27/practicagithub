<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('posts', AdminPostController::class);
        Route::resource('comments', CommentController::class);
        Route::patch('comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/posts', function () {
            return view('admin.posts.index');
        })->name('posts.index');
    });
});