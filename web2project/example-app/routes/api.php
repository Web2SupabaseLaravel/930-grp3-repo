<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/datadoctors', [DoctorsController::class, 'index']);


Route::post('/datadoctors', [DoctorsController::class, 'store']);


Route::get('/datadoctors/{id}', [DoctorsController::class, 'show']);

Route::put('/datadoctors/{id}', [DoctorsController::class, 'update']);

Route::delete('/datadoctors/{id}', [DoctorsController::class, 'destroy']);
