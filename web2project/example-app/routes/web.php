<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorsController;

#Route::post(['datadoctors', DoctorsController::class,'post']);

/*
Route::get('/datadoctors', [DoctorsController::class,'index']);
Route::post('/datadoctors', [DoctorsController::class,'store']);
Route::put('/datadoctors/{id}', [DoctorsController::class,'update']);
Route::delete('/datadoctors/{id}', [DoctorController::class, 'destroy']);

*/
Route::resource('datadoctors', DoctorsController::class);

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

require __DIR__.'/auth.php';
