<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\RegistrationController as UserRegistrationController;

// Halaman utama hanya bisa diakses oleh tamu (belum login)
Route::middleware('guest')->get('/', [HomeController::class, 'index'])->name('home');

// RedirectIfAuthenticated Middleware agar user yang sudah login tidak bisa akses login & register
Route::middleware('redirectIfAuthenticated')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    Route::get('/login', function() {
        return view('auth.login');
    })->name('login');
    
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Logout (Hanya untuk user yang login)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

// Authenticated routes (Hanya bisa diakses setelah login)
Route::middleware(['auth'])->group(function () {

    // Redirect ke dashboard berdasarkan role
    Route::get('/home', function () {
        $user = Auth::user();
        return $user->role === 'admin' ? redirect()->route('admin.dashboard') : redirect()->route('user.dashboard');
    })->name('home');

    // Admin routes (Hanya bisa diakses oleh admin)
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('teachers', TeacherController::class);
        Route::resource('activities', ActivityController::class);
        Route::resource('students', StudentController::class);
        Route::resource('management', ManagementController::class);
        Route::resource('registrations', AdminRegistrationController::class)->only(['index', 'show', 'update', 'destroy']);
    });

    // User routes (Hanya bisa diakses oleh user)
    Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::resource('registration', UserRegistrationController::class)->only(['create', 'store']);
    });

});


Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // Route untuk halaman akun (Ganti Password & Hapus Akun)
    Route::get('/account', [ProfileController::class, 'account'])->name('account');

    // Route untuk mengganti password
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');

    // Route untuk menghapus akun
    Route::delete('/delete-account', [ProfileController::class, 'deleteAccount'])->name('delete-account');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/registrations', [AdminRegistrationController::class, 'index'])->name('registrations.index');
    Route::patch('/registrations/{registration}/status', [AdminRegistrationController::class, 'updateStatus'])->name('registrations.update-status');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    // Dashboard user
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    
    // Registrasi
    Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('user.registrations.create');
    Route::post('/registrations/store', [RegistrationController::class, 'store'])->name('user.registrations.store');
});
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::delete('/admin/registrations/{id}', [RegistrationController::class, 'destroy'])->name('admin.registrations.destroy');
