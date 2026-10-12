
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');
Route::get('/about-us', [PageController::class, 'about'])->name('about');

// Fitur informasi FloodSense
Route::get('/notifikasi', [PageController::class, 'notifikasi'])->name('notifikasi');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/peta', [PageController::class, 'peta'])->name('peta');
Route::get('/kamera', [PageController::class, 'kamera'])->name('kamera');
Route::get('/evakuasi', [PageController::class, 'evakuasi'])->name('evakuasi');

// Autentikasi
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');

Route::get('/register', [PageController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Dashboard untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])
        ->name('dashboard');

    // Halaman khusus admin
    Route::middleware(\App\Http\Middleware\RoleMiddleware::class . ':admin')
        ->group(function () {
            Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])
                ->name('admin.dashboard');

            Route::get('/admin/statistik', [PageController::class, 'adminStatistik'])
                ->name('admin.statistik');
        });
});

// Laporan banjir
Route::get('/laporan', [ReportController::class, 'index'])
    ->name('laporan.index');

Route::post('/laporan', [ReportController::class, 'store'])
    ->name('laporan.store');
