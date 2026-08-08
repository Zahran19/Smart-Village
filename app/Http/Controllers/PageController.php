<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller {
    // Index
    public function index() {
        return view('beranda');
    }

    // Serving page
    public function berandaPage() {
        return view('beranda');
    }
    public function sejarahPage() {
        return view('sejarah');
    }
    public function visiMisiPage() {
        return view('visi-misi');
    }
    public function pemerintahDesaPage() {
        return view('pemerintah-desa');
    }
    public function pojokWargaPage() {
        return view('pojok-warga');
    }
    public function pojokWargaDetailPage() {
        return viev('pojok-warga.detail');
    }
    public function potensiGaleriPage() {
        return view('potensi-galeri');
    }
    public function kontakPage() {
        return view('kontak');
    }
}
