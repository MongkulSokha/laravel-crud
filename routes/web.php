<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('post')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('{id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('', [PostController::class, 'store'])->name('post.store');
        Route::patch('{id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('{id}', [PostController::class, 'destroy'])->name('post.destroy');
    });
    Route::get('', [PostController::class, 'index'])->name('post.index');
    Route::get('/{id}', [PostController::class, 'show'])->name('post.show');
});

require __DIR__.'/auth.php';
