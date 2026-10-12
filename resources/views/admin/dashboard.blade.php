<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Smart Village Desa Cimulang</title>
    <link rel="icon" href="{{ asset('images/fav-icon.png') }}" type="image/png">

    <!-- Memanggil CSS Tailwind bawaan Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Memanggil font Inter dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- VanillaJS Datepicker CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>

    <style>
        /* VanillaJS Datepicker Custom Styling agar selaras dengan tema Smart Village */
        .datepicker {
            z-index: 1050 !important;
        }
        .datepicker-dropdown {
            z-index: 1050 !important;
            padding-top: 6px;
        }
        .datepicker-picker {
            background-color: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 1.5rem !important;
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.15) !important;
            padding: 1.25rem !important;
            font-family: 'Inter', sans-serif !important;
        }
        .datepicker-header .datepicker-controls {
            padding: 0 0 0.75rem 0 !important;
        }
        .datepicker-controls .button {
            border: none !important;
            background: transparent !important;
            font-weight: 700 !important;
            color: #272831 !important;
            border-radius: 0.75rem !important;
            transition: all 0.2s !important;
        }
        .datepicker-controls .button:hover {
            background-color: #f1f5f9 !important;
            color: #007540 !important;
        }
        .datepicker-controls .view-switch {
            font-size: 0.875rem !important;
            font-weight: 800 !important;
            color: #272831 !important;
        }
        .datepicker .dow {
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            color: #94a3b8 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            height: 2rem !important;
        }
        .datepicker-cell {
            height: 2.25rem !important;
            font-size: 0.8125rem !important;
            font-weight: 600 !important;
            color: #334155 !important;
            border-radius: 0.5rem !important;
            transition: all 0.15s !important;
        }
        .datepicker-cell:not(.disabled):hover {
            background-color: #f1f5f9 !important;
            color: #007540 !important;
        }
        .datepicker-cell.focused:not(.selected) {
            background-color: #f8fafc !important;
        }
        .datepicker-cell.today:not(.selected) {
            background-color: #fef08a !important;
            color: #854d0e !important;
            font-weight: 800 !important;
        }
        .datepicker-cell.range {
            background-color: rgba(0, 117, 64, 0.10) !important;
            color: #007540 !important;
            border-radius: 0 !important;
        }
        .datepicker-cell.range-start,
        .datepicker-cell.range-end,
        .datepicker-cell.selected,
        .datepicker-cell.selected:hover {
            background-color: #007540 !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            border-radius: 0.75rem !important;
        }
        .datepicker-cell.range-start {
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }
        .datepicker-cell.range-end {
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
        }
        .datepicker-cell.disabled {
            color: #cbd5e1 !important;
        }
    </style>
</head>
<body class="bg-slate-50 font-inter text-slate-800 antialiased overflow-hidden">

    <!-- Wrapper Utama: Dikunci tinggi 100vh dan tidak boleh overflow keluar window -->
    <div class="flex h-screen w-full overflow-hidden">
        
        <!-- ================= MEMANGGIL SIDEBAR MASTER ================= -->
        @include('partials.sidebar')

        <!-- ================= KONTEN UTAMA ================= -->
        <main class="flex-1 h-full px-8 md:px-16 py-10 overflow-y-auto overflow-x-hidden relative custom-scrollbar">
            
            <!-- Ornamen Background Konten -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#007540]/5 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>

            <!-- Topbar profile -->
            <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-16 gap-6 relative z-10">
                <div class="w-full flex justify-end relative z-50">
                    <!-- Tombol Edit Profil -->
                    <a href="{{ route('profile_admin') }}" class="inline-block px-8 py-4 bg-[#FFDC2E] text-[#007540] font-inter font-black rounded-full uppercase tracking-[0.2em] text-[10px] hover:bg-[#007540] hover:text-[#FFDC2E] transition-all shadow-lg hover:-translate-y-1 cursor-pointer">
                        Edit Profil
                    </a>
                </div>
            </header>

            <!-- Judul Dashboard -->
            <div class="mb-12 relative z-10">
                <h4 class="text-[#007540] font-inter font-extrabold uppercase tracking-[0.4em] text-xs mb-2">
                    Ringkasan Sistem
                </h4>
                <h1 class="text-4xl md:text-5xl font-inter font-black text-[#272831] leading-tight tracking-tighter">
                    Dashboard Admin
                </h1>
                <div class="w-16 h-1.5 bg-[#007540] mt-6 rounded-full"></div>
            </div>

            <!-- Grid Kartu Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 relative z-10">
            
                <!-- Kartu 1: Total Berita -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border-[6px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 group overflow-hidden relative">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#007540]/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <p class="text-[#007540] font-inter uppercase tracking-[0.2em] text-[10px] font-black mb-2 relative z-10">Total Berita</p>
                    <h3 class="text-5xl font-inter font-black text-[#272831] tracking-tighter relative z-10 group-hover:-translate-y-1 transition-transform">
                        {{ $totalBerita ?? 0 }}
                    </h3>
                    <p class="text-[11px] text-slate-400 font-medium mt-2 relative z-10">Artikel Pojok Warga</p>
                </div>
                
                <!-- Kartu 2: Total Kunjungan Web (Tahun Ini) -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border-[6px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 group overflow-hidden relative">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#FFDC2E]/20 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <p class="text-[#007540] font-inter uppercase tracking-[0.2em] text-[10px] font-black mb-2 relative z-10">Total Kunjungan</p>
                    <h3 class="text-5xl font-inter font-black text-[#272831] tracking-tighter relative z-10 group-hover:-translate-y-1 transition-transform">
                        {{ number_format($visitData['visits_this_year'] ?? 0) }}
                    </h3>
                    <p class="text-[11px] text-slate-400 font-medium mt-2 relative z-10">Tahun Ini ({{ now()->year }})</p>
                </div>

                <!-- Kartu 3: Total Pesan Warga (Tanpa Badge Baru) -->
                <div onclick="openSemuaPesanModal()" class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border-[6px] border-white hover:border-[#007540]/20 hover:shadow-2xl transition-all duration-500 group overflow-hidden relative cursor-pointer">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#FFDC2E]/20 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <p class="text-[#007540] font-inter uppercase tracking-[0.2em] text-[10px] font-black mb-2 relative z-10">Pesan Warga</p>
                    <h3 class="text-5xl font-inter font-black text-[#272831] tracking-tighter group-hover:-translate-y-1 transition-transform relative z-10">
                        {{ $pesanData['total'] ?? 0 }}
                    </h3>
                    <p class="text-[11px] text-slate-400 font-medium mt-2 relative z-10">Klik untuk melihat semua</p>
                </div>

            </div>

            <!-- Wrapper Grafik & Pesan -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 relative z-10 mb-12">
                
                <!-- ================= AREA GRAFIK KUNJUNGAN ================= -->
                <div class="lg:col-span-2 bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 flex flex-col relative group">
                    
                    <!-- Header Grafik & Kontrol Filter Tahun -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                        <div>
                            <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Grafik Kunjungan Web</h3>
                            <p class="text-[#929397] font-inter text-xs sm:text-sm font-medium mt-0.5">
                                {{ $visitData['filter_description'] ?? 'Statistik akses website desa' }}
                            </p>
                        </div>

                        <!-- Dropdown Filter Tahun (Bersih & Elegan) -->
                        <div class="flex items-center gap-2.5">
                            <span class="text-xs font-inter font-bold text-slate-400">Pilih Tahun:</span>
                            <form method="GET" action="{{ url('/admin/dashboard') }}" class="inline-block">
                                <div class="relative">
                                    <select name="year" onchange="this.form.submit()" 
                                            class="bg-slate-50 border border-slate-200 hover:border-[#007540] text-slate-800 text-xs font-inter font-bold rounded-2xl px-4 py-2.5 pr-9 focus:outline-none focus:border-[#007540] cursor-pointer transition-all shadow-sm appearance-none">
                                        <option value="all" {{ ($visitData['period'] ?? '') === 'yearly' ? 'selected' : '' }}>
                                            Semua Tahun (Tren Tahunan)
                                        </option>
                                        @foreach(($visitData['available_years'] ?? [now()->year]) as $y)
                                            <option value="{{ $y }}" {{ ($visitData['period'] ?? '') !== 'yearly' && ($visitData['selected_year'] ?? now()->year) == $y ? 'selected' : '' }}>
                                                Tahun {{ $y }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-3 top-3 pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Area Canvas Chart.js (Line Chart Halus, Tanpa Bentol-Bentol Kasar) -->
                    <div class="flex-1 w-full relative h-72">
                        <canvas id="visitChart"></canvas>
                    </div>

                </div>

                <!-- ================= AREA PESAN MASUK (HANYA HARI INI, MAKS 3, TANPA BADGE BARU) ================= -->
                <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 h-[550px] flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Pesan Warga</h3>
                                <p class="text-xs font-inter font-medium text-slate-400 mt-0.5">Pesan masuk hari ini</p>
                            </div>
                        </div>
                        
                        <div class="flex flex-col gap-3.5 overflow-y-auto max-h-[300px] pr-2 custom-scrollbar">
                            @forelse(($pesanToday ?? collect()) as $pesan)
                                <!-- Desain Kotak Tiap Pesan (Tanpa Badge Baru) -->
                                <div onclick="openSemuaPesanModal()" class="bg-slate-50/70 p-4 rounded-[1.5rem] border-2 border-transparent hover:border-[#007540] hover:bg-white hover:shadow-lg transition-all duration-300 cursor-pointer group">
                                    <div class="flex items-center justify-between gap-2 mb-1.5">
                                        <div class="flex items-center gap-2 min-w-0">
                                            <div class="w-7 h-7 rounded-full bg-slate-200 flex items-center justify-center text-[#929397] group-hover:bg-[#007540] group-hover:text-white transition-colors shrink-0">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            </div>
                                            <span class="text-xs font-inter font-bold text-[#272831] truncate">{{ $pesan->nama }}</span>
                                        </div>
                                    </div>
                                    <p class="text-xs font-inter text-[#64748b] font-medium leading-relaxed group-hover:text-[#272831] transition-colors line-clamp-2">
                                        "{{ $pesan->pesan }}"
                                    </p>
                                </div>
                            @empty
                                <div class="py-16 text-center text-slate-400">
                                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3 text-slate-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                                    </div>
                                    <p class="text-xs font-inter font-medium text-slate-400">Belum ada pesan warga hari ini.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                    <!-- Tombol Lihat Semua Murni (Tanpa Counter Angka) -->
                    <button onclick="openSemuaPesanModal()" type="button" class="mt-4 w-full py-3.5 border-2 border-slate-100 hover:border-[#007540] hover:bg-[#007540] hover:text-white rounded-[1.5rem] text-[10px] text-[#272831] font-inter font-black uppercase tracking-[0.2em] transition-all cursor-pointer">
                        Lihat Semua
                    </button>
                </div>
            </div>

        </main>
    </div>

    <!-- Script Chart.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi Chart.js Modern & Bersih
            const ctx = document.getElementById('visitChart');
            if (!ctx) return;

            const chartLabels = @json($visitData['labels'] ?? []);
            const chartDataValues = @json($visitData['values'] ?? []);

            const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 260);
            gradient.addColorStop(0, 'rgba(0, 117, 64, 0.16)');
            gradient.addColorStop(1, 'rgba(0, 117, 64, 0.00)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Kunjungan',
                        data: chartDataValues,
                        borderColor: '#007540',
                        borderWidth: 3,
                        fill: true,
                        backgroundColor: gradient,
                        tension: 0.38,
                        spanGaps: false, // Tidak menghubungkan data null sehingga tidak drop palsu ke 0
                        pointRadius: 0, // Titik bulat bersih disembunyikan saat statis
                        pointHoverRadius: 7, // Titik aksen hanya muncul saat di-hover mouse
                        pointHoverBackgroundColor: '#FFDC2E',
                        pointHoverBorderColor: '#007540',
                        pointHoverBorderWidth: 2.5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            titleFont: { family: 'Inter', size: 12, weight: 'bold' },
                            bodyFont: { family: 'Inter', size: 13, weight: '900' },
                            padding: 12,
                            cornerRadius: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    if (context.parsed.y === null) return 'Belum ada data';
                                    return context.parsed.y + ' Kunjungan';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { family: 'Inter', size: 11, weight: 'bold' },
                                color: '#94a3b8'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f1f5f9',
                                borderDash: [4, 4]
                            },
                            ticks: {
                                font: { family: 'Inter', size: 11, weight: 'bold' },
                                color: '#94a3b8',
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>

    <!-- CDN SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- success notif --}}
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#007540', 
            background: '#ffffff',
            customClass: {
                popup: 'rounded-[2rem] border-[6px] border-slate-50', 
                title: 'font-inter font-black text-[#272831]',
                htmlContainer: 'font-inter text-sm text-[#929397]',
                confirmButton: 'font-inter font-black text-xs uppercase tracking-widest rounded-full px-8 py-3 shadow-md'
            }
        });
    </script>
    @endif

    {{-- error notif --}}
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#ef4444', 
            customClass: {
                popup: 'rounded-[2rem] border-[6px] border-slate-50', 
                title: 'font-inter font-black text-[#272831]',
                htmlContainer: 'font-inter text-sm text-[#929397]',
                confirmButton: 'font-inter font-black text-xs uppercase tracking-widest rounded-full px-8 py-3 shadow-md'
            }
        });
    </script>
    @endif
</body>
</html>

@include('partials.dashboard_modal')