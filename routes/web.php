<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

Route::prefix('appointments')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/{id}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::get('/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});
