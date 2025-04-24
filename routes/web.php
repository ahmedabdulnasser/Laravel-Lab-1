<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::prefix('posts')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/show/{id}', [PostController::class, 'show'])->name('posts.show')->where('id', '[0-9]+');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit')->where('id', '[0-9]+');

    Route::post('/store', [PostController::class, 'store'])->name('posts.store');
    Route::put('/update/{id}', [PostController::class, 'update'])->name('posts.update')->where('id', '[0-9]+');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete')->where('id', '[0-9]+');
});

Route::get('/csrf-token', function () {
    return csrf_token();
});

Route::fallback(function () {
    return response()->view('404', [], 404);
})->name('fallback');


