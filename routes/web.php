<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\PemDesController;

// GET Method
// public routes
Route::get('/', [PageController::class, 'index']);

Route::get('/test-misi', [PageController::class, 'testMisiPage']);
Route::get('/test-visi', [PageController::class, 'testVisiPage']);
Route::get('/test-kontak', [PageController::class, 'testKontakPage']);

Route::get('/beranda', [PageController::class, 'berandaPage'])->name('home');
Route::get('/sejarah', [PageController::class, 'sejarahPage']);
Route::get('/visi-misi', [PageController::class, 'visiMisiPage']);
Route::get('/pemerintah-desa', [PageController::class, 'pemerintahDesaPage']);
Route::get('/pojok-warga', [PageController::class, 'pojokWargaPage']);
Route::get('/pojok-warga/detail', [PageController::class, 'pojokWargaDetailPage']);
Route::get('/potensi-galeri', [PageController::class, 'potensiGaleriPage']);
Route::get('/kontak', [PageController::class, 'kontakPage']);

// Admin Routes
Route::get('/admin/login', [AdminController::class, 'loginPage'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login']);

Route::middleware('auth')->group(function() {
    // GET Method    
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboardPage']);
    Route::get('/admin/beranda', [AdminController::class, 'berandaPage']);
    Route::get('/admin/visi-misi', [AdminController::class, 'visiMisiPage']);
    Route::get('/admin/sejarah-desa', [AdminController::class, 'sejarahDesaPage']);
    Route::get('/admin/pemerintah-desa', [AdminController::class, 'pemerintahDesaPage']);
    Route::get('/admin/pojok-warga', [AdminController::class, 'pojokWargaPage']);
    Route::get('/admin/potensi-galeri', [AdminController::class, 'potensiGaleriPage']);
    Route::get('/admin/kontak', [AdminController::class, 'kontakPage']);

    // POST Method
    Route::post('/admin/misi', [VisiMisiController::class, 'addMisi']);
    Route::post('/admin/logout', [AdminController::class, 'logout']);
    Route::post('/admin/pemerintah-desa', [PemDesController::class, 'addPemDes']);
    Route::post('/admin/potensi', [PotensiGaleriController::class, 'addPotensi']);
    Route::post('/admin/galeri', [PotensiGaleriController::class, 'addGaleri']);
    
    // PATCH Method
    Route::patch('/admin/visi', [VisiMisiController::class, 'modifyVisi']);
    Route::patch('/admin/misi', [VisiMisiController::class, 'modifyMisi']);
    Route::patch('/admin/sejarah-desa', [SejarahController::class, 'modifySejarah']);
    Route::patch('/admin/pemerintah-desa', [PemDesController::class, 'modifyPemDes']);
    Route::patch('/admin/potensi', [PotensiGaleriController::class, 'modifyPotensi']);
    Route::patch('/admin/galeri', [PotensiGaleriController::class, 'modifyGaleri']);
    Route::patch('/admin/kontak', [KontakController::class, 'modifyKontak']);

    // DELETE Method
    Route::delete('/admin/misi', [VisiMisiController::class, 'removeMisi']);
    Route::delete('/admin/pemerintah-desa', [PemDesController::class,  'removePemDes']);
    Route::post('/admin/potensi', [PotensiGaleriController::class,  'removePotensi']);
    Route::post('/admin/galeri', [PotensiGaleriController::class, 'removeGaleri']);
});
