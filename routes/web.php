<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/sejarah', function () {
    return view('sejarah');
});

Route::get('/visi-misi', function () {
    return view('visimisi');
});

Route::get('/pemerintah-desa', function () {
    return view('pemerintah');
});

Route::get('/pojok-warga', function () {
    return view('pojokwarga');
});

Route::get('/potensi-galeri', function () {
    return view('potensi');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/pojok-warga/detail', function () {
    return view('pojok-warga.detail');
});

// Ini adalah rute baru untuk memanggil halaman Admin Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.admin-dashboard');
});

Route::get('/admin/beranda', function () {
    return view('admin.admin-beranda');
});

Route::get('/admin/visi-misi', function () {
    return view('admin.admin-visi-misi');
});

Route::get('/admin/sejarah-desa', function () {
    return view('admin.admin-sejarah-desa');
});

Route::get('/admin/pemerintah-desa', function () {
    return view('admin.admin-pemerintah-desa');
});

Route::get('/admin/pojok-warga', function () {
    return view('admin.admin-pojok-warga');
});

Route::get('/admin/potensi-galeri', function () {
    return view('admin.admin-potensi-galeri');
});

Route::get('/admin/kontak', function () {
    return view('admin.admin-kontak');
});