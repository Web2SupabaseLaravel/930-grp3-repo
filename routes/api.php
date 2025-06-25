<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAccountController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\Api\AppointmentApiController;

// ✅ Authenticated user route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ Users API
Route::apiResource('users', UserAccountController::class);

// ✅ Services API
Route::apiResource('services', ServiceController::class);

// ✅ Doctors API
Route::get('/datadoctors', [DoctorsController::class, 'index']);
Route::post('/datadoctors', [DoctorsController::class, 'store']);
Route::get('/datadoctors/{id}', [DoctorsController::class, 'show']);
Route::put('/datadoctors/{id}', [DoctorsController::class, 'update']);
Route::delete('/datadoctors/{id}', [DoctorsController::class, 'destroy']);

// ✅ Appointments API
Route::prefix('appointments')->group(function () {
    Route::get('/', [AppointmentApiController::class, 'index']);
    Route::post('/', [AppointmentApiController::class, 'store']);
    Route::get('/{id}', [AppointmentApiController::class, 'show']);
    Route::put('/{id}', [AppointmentApiController::class, 'update']);
    Route::delete('/{id}', [AppointmentApiController::class, 'destroy']);
});
