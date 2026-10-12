<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteContent;
use App\Models\PotensiGaleri;
use App\Models\PojokWarga;
use App\Services\DashboardAnalyticsService;

class AdminController extends Controller {

    public function __construct(
        protected DashboardAnalyticsService $analyticsService
    ) {}

    // Index
    public function index() {
        return redirect("/admin/dashboard");
    }

    // Serving page
    public function loginPage() {
        return view('admin.login');
    }
    public function dashboardPage(Request $request) {
        $totalBerita = $this->analyticsService->getTotalBerita();

        $period = $request->query('period');
        $selectedYear = $request->query('year');

        if (!$period) {
            if ($selectedYear && $selectedYear !== 'all') {
                $period = 'monthly';
            } else {
                $period = 'yearly';
            }
        } elseif ($selectedYear === 'all') {
            $period = 'yearly';
        }

        $visitFilters = [
            'period' => $period,
            'year' => ($selectedYear && $selectedYear !== 'all') ? (int) $selectedYear : now()->year,
            'start_date' => $request->query('start_date'),
            'end_date' => $request->query('end_date'),
            'date_range' => $request->query('visit_date_range'),
        ];
        $visitData = $this->analyticsService->getVisitAnalytics($visitFilters);

        $pesanFilters = [
            'start_date' => $request->query('start_date') ?: $request->query('pesan_start_date'),
            'end_date' => $request->query('end_date') ?: $request->query('pesan_end_date'),
            'date_range' => $request->query('pesan_date_range'),
        ];
        $pesanData = $this->analyticsService->getPesanWargaList($pesanFilters);
        $pesanToday = $this->analyticsService->getPesanWargaToday(3);

        return view('admin.dashboard', compact('totalBerita', 'visitData', 'pesanData', 'pesanToday'));
    }
    public function berandaPage() {
        $contents = SiteContent::where('page', 'beranda')->get()->keyBy('key');
        return view('admin.beranda', compact('contents'));
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
        $beritaList = PojokWarga::orderBy('created_at', 'desc')->get();
        return view('admin.pojok-warga', compact('beritaList'));
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
            return redirect()->intended('/admin/dashboard')->with('success', 'Selamat datang kembali, Admin!');;
        }

        return back()->withErrors([
            'login' => 'Username/email atau password salah.',
        ])->onlyInput('login');
    }

    public function modifyProfil(Request $request) {
        return app(ProfileController::class)->update($request);
    }
    
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("home");

    }
}
