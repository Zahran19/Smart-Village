<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.visi-misi');
    }
    public function sejarahDesaPage() {
        return view('admin.sejarah-desa');
    }
    public function pemerintahDesaPage() {
        return view('admin.pemerintah-desa');
    }
    public function pojokWargaPage() {
        return view('admin.pojok-warga');
    }
    public function potensiGaleriPage() {
        return view('admin.potensi-galeri');
    }
    public function kontakPage() {
        return view('admin.kontak');
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

        return redirect()->route("login");

    }
}
