<?php

use App\Http\Controllers\ProfileController;
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
});
use App\Http\Controllers\ServiceController;

Route::middleware('auth')->group(function () {
    Route::get('dataservice', [ServiceController::class, 'index'])->name('dataservice.index');
    Route::get('dataservice/create', [ServiceController::class, 'create'])->name('dataservice.create');
    Route::post('dataservice', [ServiceController::class, 'store'])->name('dataservice.store');
    Route::get('dataservice/{id}/edit', [ServiceController::class, 'edit'])->name('dataservice.edit');
    Route::put('dataservice/{id}', [ServiceController::class, 'update'])->name('dataservice.update');
    Route::delete('dataservice/{id}', [ServiceController::class, 'destroy'])->name('dataservice.destroy');
});

require __DIR__.'/auth.php';
