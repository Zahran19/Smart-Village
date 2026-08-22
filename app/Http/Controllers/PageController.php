<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class PageController extends Controller {
    // Index
    public function index() {
        return redirect('beranda');
    }

    // Serving page
    public function berandaPage() {
        $contents = SiteContent::where('page', 'beranda')->get()->keyBy('key');
        return view('beranda', compact('contents'));
    }
    public function sejarahPage() {
        $contents = SiteContent::where('page', 'sejarah')->get()->keyBy('key');
        return view('sejarah', compact('contents'));
    }
    public function visiMisiPage() {
        $contents = SiteContent::where('page', 'visi_misi')->get()->keyBy('key');
        return view('visi-misi', compact('contents'));
    }
    public function pemerintahDesaPage() {
        $contents = SiteContent::where('page', 'pemerintah_desa')->get()->keyBy('key');
        return view('pemerintah-desa', compact('contents'));
    }
    public function pojokWargaPage() {
        $contents = SiteContent::where('page', 'pojok_warga')->get()->keyBy('key');
        return view('pojok-warga', compact('contents'));
    }
    public function pojokWargaDetailPage() {
        $contents = SiteContent::where('page', 'pojok_warga_detail')->get()->keyBy('key');
        return view('pojok-warga.detail', compact('contents'));
    }
    public function potensiGaleriPage() {
        $contents = SiteContent::where('page', 'potensi_galeri')->get()->keyBy('key');
        return view('potensi-galeri', compact('contents'));
    }
    public function kontakPage() {
        $contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('kontak', compact('contents'));
    }
}
