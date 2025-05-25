<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\Users_accountsController;
#Route::post(['datadoctors', DoctorsController::class,'post']);

/*
Route::get('/datadoctors', [DoctorsController::class,'index']);
Route::post('/datadoctors', [DoctorsController::class,'store']);
Route::put('/datadoctors/{id}', [DoctorsController::class,'update']);
Route::delete('/datadoctors/{id}', [DoctorController::class, 'destroy']);

*/
Route::resource('datadoctors', DoctorsController::class);


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
