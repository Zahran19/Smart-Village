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
