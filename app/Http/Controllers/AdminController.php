<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteContent;
use App\Models\PotensiGaleri;

class AdminController extends Controller {
    // Index
    public function index() {
        return redirect("/admin/dashboard");
    }

    // Serving page
    public function loginPage() {
        return view('admin.login');
    }
    public function dashboardPage() {
        return view('admin.dashboard');
    }
    public function berandaPage() {
        return view('admin.beranda');
    }
    public function visiMisiPage() {
        $contents = SiteContent::where('page', 'visi_misi')->get()->keyBy('key');
        return view('admin.visi-misi', compact('contents'));
    }
    public function sejarahDesaPage() {
        $contents = SiteContent::where('page', 'sejarah')->get()->keyBy('key');
        return view('admin.sejarah-desa', compact('contents'));
    }
    public function pemerintahDesaPage() {
        $contents = SiteContent::where('page', 'pemerintah_desa')->get()->keyBy('key');
        return view('admin.pemerintah-desa', compact('contents'));
    }
    public function pojokWargaPage() {
        $contents = SiteContent::where('page', 'pojok_warga')->get()->keyBy('key');
        return view('admin.pojok-warga', compact('contents'));
    }
    public function potensiGaleriPage() {
        $contents = PotensiGaleri::all()->groupBy('type');
        return view('admin.potensi-galeri', compact('contents'));
    }
    public function kontakPage() {
        $contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');
        return view('admin.kontak', compact('contents'));
    }

    // Backend logic
    public function login(Request $request) {
        $request->validate([
            'username_or_email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $username_or_email = $request->input('username_or_email');

        $field = filter_var($username_or_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [$field => $username_or_email, 'password' => $request->input('password')];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'login' => 'Username/email atau password salah.',
        ])->onlyInput('login');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("home");

    }
}
