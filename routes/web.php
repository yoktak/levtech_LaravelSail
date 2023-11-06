<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::get('/posts/edit/{post}', [PostController::class, 'edit']);
    Route::post('/posts/store', [PostController::class, 'store']);
    Route::put('/posts/update/{post}', [PostController::class, 'update']);
    Route::delete('/posts/delete/{post}', [PostController::class, 'delete']);
    Route::get('/posts/{post}', [PostController::class, 'show']);

    // いいね機能
    Route::post('/posts/like', [LikeController::class, 'like']);
});

require __DIR__.'/auth.php';