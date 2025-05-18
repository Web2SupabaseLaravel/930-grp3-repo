<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\Users_accountsController;
#Route::post(['datadoctors', DoctorsController::class,'post']);


Route::get('datadoctors', [DoctorsController::class,'index']);
Route::post('datadoctors', [DoctorsController::class,'store']);
Route::put('datadoctors/{id}', [DoctorsController::class,'update']);
Route::delete('/datadoctors/{id}', [DoctorController::class, 'destroy']);

Route::get('datausers_accounts', [Users_accountsController::class,'index']);
Route::post('datausers_accounts', [Users_accountsController::class,'store']);
Route::put('datausers_accounts/{id}', [Users_accountsController::class,'update']);
Route::delete('/datausers_accounts/{id}', [Users_accountsController::class, 'destroy']);

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
