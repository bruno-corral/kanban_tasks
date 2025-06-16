<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', [BoardController::class, 'index'])->name('dashboard');
    Route::get('/board', [BoardController::class, 'create'])->name('board.create');
    Route::post('/board', [BoardController::class, 'store'])->name('board.store');
    Route::get('/board/show/{id}', [BoardController::class, 'showInfoBoard'])->name('board.show');
    Route::get('/board/{id}', [BoardController::class, 'edit'])->name('board.edit');
    Route::put('/board/{id}', [BoardController::class, 'update'])->name('board.update');
    Route::delete('/board/{id}', [BoardController::class, 'destroy'])->name('board.destroy');

    Route::get('/category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [BoardController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [BoardController::class, 'update'])->name('board.update');
    Route::delete('/category/{id}', [BoardController::class, 'destroy'])->name('category.destroy');
});

require __DIR__.'/auth.php';
