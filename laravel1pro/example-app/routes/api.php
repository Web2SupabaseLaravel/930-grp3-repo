<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAccountController;

Route::apiResource('users', UserAccountController::class);
