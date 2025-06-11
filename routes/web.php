<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

Route::middleware('auth')->group(function () {
    Route::get('dataservice', [ServiceController::class, 'index'])->name('dataservice.index');
    Route::get('dataservice/create', [ServiceController::class, 'create'])->name('dataservice.create');
    Route::post('dataservice', [ServiceController::class, 'store'])->name('dataservice.store');
    Route::get('dataservice/{id}/edit', [ServiceController::class, 'edit'])->name('dataservice.edit');
    Route::put('dataservice/{id}', [ServiceController::class, 'update'])->name('dataservice.update');
    Route::delete('dataservice/{id}', [ServiceController::class, 'destroy'])->name('dataservice.destroy');
});

require __DIR__.'/auth.php';
