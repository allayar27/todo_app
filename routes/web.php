<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskConfirmController;
use Illuminate\Support\Facades\Route;



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

    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
    Route::put('tasks/{task}/comfirm', TaskConfirmController::class)->name('tasks.confirm');

});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
