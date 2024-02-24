<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChatController;

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
    Route::post('/posts/store', [PostController::class, 'store']);
    Route::put('/posts/update/{post}', [PostController::class, 'update']);
    Route::delete('/posts/delete/{post}', [PostController::class, 'delete']);

    // いいね機能
    Route::post('/posts/like', [LikeController::class, 'like']);

    // chat機能
    Route::get('/chatroom/select', [ChatController::class, 'select'])->name('chatroom_select');
    Route::get('/chatroom/{chatroom}', [ChatController::class, 'room']);
    // message非同期
    Route::post('/newmessage', [MessageController::class, 'newMessage']);
    Route::get('/allmessage',[MessageController::class, 'allMessage']);


});

require __DIR__.'/auth.php';