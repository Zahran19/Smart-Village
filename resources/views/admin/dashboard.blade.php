<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Smart Village Desa Cimulang</title>
    <link rel="icon" href="{{ asset('fav-icon.png') }}" type="image/png">
    
    <!-- Memanggil CSS Tailwind bawaan Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Memanggil font Inter dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                
                <div class="w-full flex justify-end">
                    <!-- Tombol Edit Profil -->
                    <button class="inline-block px-8 py-4 bg-[#FFDC2E] text-[#007540] font-inter font-black rounded-full uppercase tracking-[0.2em] text-[10px] hover:bg-[#007540] hover:text-[#FFDC2E] transition-all shadow-lg hover:-translate-y-1">
                        Edit Profil
                    </button>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16 relative z-10">
                
                <!-- Kartu 1 -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border-[6px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 group overflow-hidden relative">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#007540]/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <p class="text-[#007540] font-inter uppercase tracking-[0.2em] text-[10px] font-black mb-2 relative z-10">Total Penduduk</p>
                    <h3 class="text-5xl font-inter font-black text-[#272831] tracking-tighter relative z-10 group-hover:-translate-y-1 transition-transform">1.000</h3>
                </div>
                
                <!-- Kartu 2 -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border-[6px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 group overflow-hidden relative">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#FFDC2E]/20 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <p class="text-[#007540] font-inter uppercase tracking-[0.2em] text-[10px] font-black mb-2 relative z-10">Total Kartu Keluarga</p>
                    <h3 class="text-5xl font-inter font-black text-[#272831] tracking-tighter relative z-10 group-hover:-translate-y-1 transition-transform">800</h3>
                </div>
                
                <!-- Kartu 3 -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border-[6px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 group overflow-hidden relative">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#007540]/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <p class="text-[#007540] font-inter uppercase tracking-[0.2em] text-[10px] font-black mb-2 relative z-10">Total Berita</p>
                    <h3 class="text-5xl font-inter font-black text-[#272831] tracking-tighter relative z-10 group-hover:-translate-y-1 transition-transform">10</h3>
                </div>
                
                <!-- Kartu 4 -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border-[6px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 group overflow-hidden relative">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#FFDC2E]/20 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <p class="text-[#007540] font-inter uppercase tracking-[0.2em] text-[10px] font-black mb-2 relative z-10">Kunjungan Web</p>
                    <h3 class="text-5xl font-inter font-black text-[#272831] tracking-tighter relative z-10 group-hover:-translate-y-1 transition-transform">67</h3>
                </div>

            </div>

            <!-- Wrapper Grafik & Pesan -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 relative z-10">
                
                <!-- ================= AREA GRAFIK ================= -->
                <div class="lg:col-span-2 bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 flex flex-col relative group">
                    <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter mb-2">Grafik Kunjungan</h3>
                    <p class="text-[#929397] font-inter text-sm font-medium">Statistik akses website desa periode 2021 - 2025</p>
                    
                    <div class="flex-1 w-full relative mt-10 h-64">
                        
                        <!-- Y-axis (Kiri) -->
                        <div class="absolute left-0 top-0 bottom-8 flex flex-col justify-between text-[11px] font-inter font-bold text-slate-500 w-8 items-start">
                            <span>40</span>
                            <span>30</span>
                            <span>20</span>
                            <span>10</span>
                            <span>0</span>
                        </div>

                        <!-- Grid Area (Kanan) -->
                        <div class="absolute left-10 right-6 top-2 bottom-8">
                            
                            <!-- Garis Putus-putus Horizontal -->
                            <div class="absolute inset-0 flex flex-col justify-between z-0">
                                <div class="border-t-[1.5px] border-dashed border-slate-200 w-full"></div>
                                <div class="border-t-[1.5px] border-dashed border-slate-200 w-full"></div>
                                <div class="border-t-[1.5px] border-dashed border-slate-200 w-full"></div>
                                <div class="border-t-[1.5px] border-dashed border-slate-200 w-full"></div>
                                <div class="border-t-[1.5px] border-slate-200 w-full"></div>
                            </div>

                            <!-- SVG Garis Kurva (Tebal & Glowing) -->
                            <svg class="absolute inset-0 h-full w-full z-10 overflow-visible" preserveAspectRatio="none" viewBox="0 0 100 100">
                                <path d="M 0 87.5 L 25 75 L 50 72.5 L 75 45 L 100 40" fill="none" stroke="#007540" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke" class="drop-shadow-[0_8px_8px_rgba(0,117,64,0.25)]"/>
                            </svg>

                            <!-- Data Points (Titik) -->
                            <div class="absolute w-6 h-6 bg-[#FFDC2E] border-[4px] border-[#272831] rounded-full z-20 top-[87.5%] left-[0%] -translate-x-1/2 -translate-y-1/2 hover:scale-125 transition-transform duration-300 cursor-pointer shadow-md"></div>
                            <div class="absolute w-6 h-6 bg-[#FFDC2E] border-[4px] border-[#272831] rounded-full z-20 top-[75%] left-[25%] -translate-x-1/2 -translate-y-1/2 hover:scale-125 transition-transform duration-300 cursor-pointer shadow-md"></div>
                            <div class="absolute w-6 h-6 bg-[#FFDC2E] border-[4px] border-[#272831] rounded-full z-20 top-[72.5%] left-[50%] -translate-x-1/2 -translate-y-1/2 hover:scale-125 transition-transform duration-300 cursor-pointer shadow-md"></div>
                            <div class="absolute w-6 h-6 bg-[#FFDC2E] border-[4px] border-[#272831] rounded-full z-20 top-[45%] left-[75%] -translate-x-1/2 -translate-y-1/2 hover:scale-125 transition-transform duration-300 cursor-pointer shadow-md"></div>
                            <div class="absolute w-6 h-6 bg-[#FFDC2E] border-[4px] border-[#272831] rounded-full z-20 top-[40%] left-[100%] -translate-x-1/2 -translate-y-1/2 hover:scale-125 transition-transform duration-300 cursor-pointer shadow-md"></div>
                        </div>

                        <!-- X-axis Label (Bawah) -->
                        <div class="absolute bottom-[-5px] left-10 right-6 h-6">
                            <span class="absolute left-[0%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap">Jan 21</span>
                            <span class="absolute left-[12.5%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap hidden md:block">Jul 21</span>
                            <span class="absolute left-[25%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap">Jan 22</span>
                            <span class="absolute left-[37.5%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap hidden md:block">Jul 22</span>
                            <span class="absolute left-[50%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap">Jan 23</span>
                            <span class="absolute left-[62.5%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap hidden md:block">Jul 23</span>
                            <span class="absolute left-[75%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap">Jan 24</span>
                            <span class="absolute left-[87.5%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap hidden md:block">Jul 24</span>
                            <span class="absolute left-[100%] -translate-x-1/2 text-[11px] font-inter font-bold text-slate-500 whitespace-nowrap">Jan 25</span>
                        </div>
                    </div>
                </div>

                <!-- Area Pesan Masuk -->
                <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 h-[450px] flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Pesan Warga</h3>
                        <span class="bg-[#FFDC2E] text-[#007540] text-[10px] font-inter font-black px-3 py-1 rounded-full">3 Baru</span>
                    </div>
                    
                    <div class="flex flex-col gap-4 overflow-y-auto pr-2 custom-scrollbar">
                        <!-- Looping Pesan -->
                        @foreach(['Halo admin, ada laporan jalan rusak di RT 02.', 'Mohon info syarat pembuatan KTP baru.', 'Selamat pagi, undangan rapat desa sudah saya terima.'] as $pesan)
                            
                            <!-- Desain Kotak Tiap Pesan -->
                            <div class="bg-slate-50/70 p-5 rounded-[1.5rem] border-2 border-transparent hover:border-[#007540] hover:bg-white hover:shadow-lg transition-all duration-300 cursor-pointer group">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-[#929397] group-hover:bg-[#007540] group-hover:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <span class="text-xs font-inter font-bold text-[#272831]">Warga</span>
                                </div>
                                <p class="text-sm font-inter text-[#929397] font-medium leading-relaxed group-hover:text-[#272831] transition-colors">
                                    "{{ $pesan }}"
                                </p>
                            </div>
                            
                        @endforeach
                    </div>
                    
                    <button class="mt-6 w-full py-4 border-2 border-slate-100 hover:border-[#007540] hover:bg-[#007540] hover:text-white rounded-[1.5rem] text-[10px] text-[#272831] font-inter font-black uppercase tracking-[0.2em] transition-all">
                        Lihat Semua
                    </button>
                </div>
            </div>

        </main>
    </div>

</body>
</html>