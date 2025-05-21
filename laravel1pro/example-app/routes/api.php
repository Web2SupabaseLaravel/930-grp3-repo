<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EventController;

Route::apiResource('dataevent', EventController::class);
