<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;

Route::get('/login-supabase', [AuthController::class, 'showLoginForm'])->name('login.supabase.form');
Route::post('/login-supabase', [AuthController::class, 'login'])->name('login.supabase');

Route::get('/createpatient', [PatientController::class, 'create']);
Route::post('/createpatient', [PatientController::class, 'store'])->name('patient.store');
Route::get('/patients', [PatientController::class, 'index'])->name('patient.index');

Route::get('/', fn() => view('welcome'));


Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect()->route('login.supabase.form')->with('error', 'يرجى تسجيل الدخول أولاً.');
    }

    return view('dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
