<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthApiController;
use App\Http\Controllers\Api\V1\Public\PesanWargaApiController;
use App\Http\Controllers\Api\V1\Public\BerandaApiController;
use App\Http\Controllers\Api\V1\Public\PojokWargaPublicApiController;
use App\Http\Controllers\Api\V1\Public\KontakPublicApiController;
use App\Http\Controllers\Api\V1\Admin\DashboardApiController;
use App\Http\Controllers\Api\V1\Admin\PesanWargaAdminApiController;
use App\Http\Controllers\Api\V1\Admin\BerandaAdminApiController;
use App\Http\Controllers\Api\V1\Admin\PojokWargaAdminApiController;
use App\Http\Controllers\Api\V1\Admin\KontakAdminApiController;

/*
|--------------------------------------------------------------------------
| API Routes - V1
|--------------------------------------------------------------------------
|
| Rute API terstruktur untuk dikonsumsi frontend atau aplikasi mobile.
| Dilengkapi dengan prefix v1 dan pengelompokan yang jelas.
|
*/

Route::prefix('v1')->group(function () {

    // ==========================================
    // 1. PUBLIC ROUTES (Tanpa Autentikasi)
    // ==========================================
    Route::get('/beranda', [BerandaApiController::class, 'index'])->name('api.v1.public.beranda');
    Route::post('/pesan-warga', [PesanWargaApiController::class, 'store'])->name('api.v1.pesan-warga.store');
    Route::get('/pojok-warga', [PojokWargaPublicApiController::class, 'index'])->name('api.v1.public.pojok-warga.index');
    Route::get('/pojok-warga/{slug}', [PojokWargaPublicApiController::class, 'show'])->name('api.v1.public.pojok-warga.show');
    Route::get('/kontak', [KontakPublicApiController::class, 'index'])->name('api.v1.public.kontak');

    // ==========================================
    // 2. AUTHENTICATION ROUTES
    // ==========================================
    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthApiController::class, 'login'])->name('api.v1.auth.login');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/logout', [AuthApiController::class, 'logout'])->name('api.v1.auth.logout');
            Route::get('/me', [AuthApiController::class, 'me'])->name('api.v1.auth.me');
            Route::put('/profile', [AuthApiController::class, 'updateProfile'])->name('api.v1.auth.profile');
            Route::patch('/profile', [AuthApiController::class, 'updateProfile']);
        });
    });

    // ==========================================
    // 3. ADMIN MANAGEMENT ROUTES (Protected via Sanctum)
    // ==========================================
    Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
        
        // Profile
        Route::put('/profile', [AuthApiController::class, 'updateProfile'])->name('api.v1.admin.profile');
        Route::patch('/profile', [AuthApiController::class, 'updateProfile']);

        // Beranda Hero Management
        Route::get('/beranda/hero', [BerandaAdminApiController::class, 'getHero'])->name('api.v1.admin.beranda.hero');
        Route::match(['put', 'patch', 'post'], '/beranda/hero', [BerandaAdminApiController::class, 'updateHero'])->name('api.v1.admin.beranda.update-hero');

        // Dashboard & Analytics
        Route::get('/dashboard-stats', [DashboardApiController::class, 'stats'])->name('api.v1.admin.dashboard.stats');
        Route::get('/web-visits', [DashboardApiController::class, 'webVisits'])->name('api.v1.admin.web-visits');

        // Pesan Warga Management
        Route::get('/pesan-warga', [PesanWargaAdminApiController::class, 'index'])->name('api.v1.admin.pesan-warga.index');
        Route::patch('/pesan-warga/{id}/status', [PesanWargaAdminApiController::class, 'updateStatus'])->name('api.v1.admin.pesan-warga.status');
        Route::delete('/pesan-warga/{id}', [PesanWargaAdminApiController::class, 'destroy'])->name('api.v1.admin.pesan-warga.destroy');

        // Pojok Warga (Berita) Management
        Route::get('/pojok-warga', [PojokWargaAdminApiController::class, 'index'])->name('api.v1.admin.pojok-warga.index');
        Route::post('/pojok-warga', [PojokWargaAdminApiController::class, 'store'])->name('api.v1.admin.pojok-warga.store');
        Route::get('/pojok-warga/{id}', [PojokWargaAdminApiController::class, 'show'])->name('api.v1.admin.pojok-warga.show');
        Route::match(['put', 'patch', 'post'], '/pojok-warga/{id}', [PojokWargaAdminApiController::class, 'update'])->name('api.v1.admin.pojok-warga.update');
        Route::delete('/pojok-warga/{id}', [PojokWargaAdminApiController::class, 'destroy'])->name('api.v1.admin.pojok-warga.destroy');

        // Kontak Desa Management
        Route::get('/kontak', [KontakAdminApiController::class, 'index'])->name('api.v1.admin.kontak.index');
        Route::match(['put', 'patch', 'post'], '/kontak', [KontakAdminApiController::class, 'update'])->name('api.v1.admin.kontak.update');
    });

});
