<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\HomeController;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
})->name('home');

// لوحة التحكم - محمية بالتوثيق
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// تسجيل الخروج
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

// صفحة Home (في الغالب بعد تسجيل الدخول)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// بيانات الملف الشخصي - محمية
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// موارد الأطباء (Doctors) - باستخدام resource controller محمي بالـ auth
Route::middleware('auth')->group(function () {
    Route::resource('datadoctors', DoctorsController::class);
});

// مواعيد (Appointments) مع CRUD محمية بالـ auth و Route prefix
Route::prefix('appointments')->middleware('auth')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/{id}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::get('/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});

// الخدمات (Services) CRUD محمية بالـ auth
Route::middleware('auth')->group(function () {
    Route::get('dataservice', [ServiceController::class, 'index'])->name('dataservice.index');
    Route::get('dataservice/create', [ServiceController::class, 'create'])->name('dataservice.create');
    Route::post('dataservice', [ServiceController::class, 'store'])->name('dataservice.store');
    Route::get('dataservice/{id}/edit', [ServiceController::class, 'edit'])->name('dataservice.edit');
    Route::put('dataservice/{id}', [ServiceController::class, 'update'])->name('dataservice.update');
    Route::delete('dataservice/{id}', [ServiceController::class, 'destroy'])->name('dataservice.destroy');
});

// الفعاليات (Events) باستخدام resource controller محمية بالـ auth
Route::middleware('auth')->group(function () {
    Route::resource('dataevent', EventController::class);
});

// تحميل ملف المصادقة (auth.php) الخاص بـ Laravel Breeze/Fortify
require __DIR__.'/auth.php';
