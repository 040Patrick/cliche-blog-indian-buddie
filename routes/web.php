<?php


use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//** SERVER DASHBOARD */
Route::get('/', [ServerController::class, 'home'])->name('home');

//** SIMPLE USER */
Route::get('/dashboard', [UserController::class])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    //** @PROFILE */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //** @ADMIN */
    Route::prefix('admin')->middleware('admin')->group(function () {
        //** @POSTS */
        Route::resource('/dashboard/post', AdminPostController::class);
    });
});

require __DIR__.'/auth.php';
