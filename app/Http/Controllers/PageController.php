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
    public function testVisiPage() {
        return view('test-visi');
    }
    public function testMisiPage() {
        return view('test-misi');
    }
    public function testKontakPage() {
        return view('test-kontak');
    }
    public function berandaPage() {
        $contents = SiteContent::where('page', 'beranda')->get()->keyBy('key');
        $kontak_contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('beranda', compact('contents', 'kontak_contents'));
    }
    public function sejarahPage() {
        $contents = SiteContent::where('page', 'sejarah')->get()->keyBy('key');
        $kontak_contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('sejarah', compact('contents', 'kontak_contents'));
    }
    public function visiMisiPage() {
        $contents = SiteContent::where('page', 'visi_misi')->get()->keyBy('key');
        $kontak_contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('visi-misi', compact('contents', 'kontak_contents'));
    }
    public function pemerintahDesaPage() {
        $contents = SiteContent::where('page', 'pemerintah_desa')->get()->keyBy('key');
        $kontak_contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('pemerintah-desa', compact('contents', 'kontak_contents'));
    }
    public function pojokWargaPage() {
        $contents = SiteContent::where('page', 'pojok_warga')->get()->keyBy('key');
        $kontak_contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('pojok-warga', compact('contents', 'kontak_contents'));
    }
    public function pojokWargaDetailPage() {
        $contents = SiteContent::where('page', 'pojok_warga_detail')->get()->keyBy('key');
        $kontak_contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('pojok-warga.detail', compact('contents', 'kontak_contents'));
    }
    public function potensiGaleriPage() {
        $contents = SiteContent::where('page', 'potensi_galeri')->get()->keyBy('key');
        $kontak_contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('potensi-galeri', compact('contents', 'kontak_contents'));
    }
    public function kontakPage() {
        $contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        $kontak_contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('kontak', compact('contents', 'kontak_contents'));
    }
}
