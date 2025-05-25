<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController; // ✅ صححنا المسار

// مسارات تسجيل الدخول والتسجيل
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// المسارات المحمية بـ JWT middleware
Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});