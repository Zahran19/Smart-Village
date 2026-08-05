<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi Misi Admin | Smart Village Desa Cimulang</title>
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

            <!-- Topbar (Pencarian & Profil) -->
            <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-16 gap-6 relative z-10">
                
                <!-- Kolom Pencarian -->
                <div class="relative w-full md:w-[450px] group">
                    <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400 group-focus-within:text-[#007540] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" 
                           placeholder="Cari data atau informasi..." 
                           class="w-full bg-white border-2 border-white text-[#272831] font-inter font-bold rounded-full py-4 pl-14 pr-6 shadow-[0_10px_30px_rgba(0,0,0,0.03)] focus:outline-none focus:border-[#007540] focus:ring-4 focus:ring-[#007540]/10 transition-all placeholder:text-slate-400 placeholder:font-medium">
                </div>
                
                <!-- Tombol Edit Profil -->
                <button class="inline-block px-8 py-4 bg-[#FFDC2E] text-[#007540] font-inter font-black rounded-full uppercase tracking-[0.2em] text-[10px] hover:bg-[#007540] hover:text-[#FFDC2E] transition-all shadow-lg hover:-translate-y-1">
                    Edit Profil
                </button>
            </header>

            <!-- Judul Halaman -->
            <div class="mb-12 relative z-10">
                <h4 class="text-[#007540] font-inter font-extrabold uppercase tracking-[0.4em] text-xs mb-2">
                    Profil Desa
                </h4>
                <h1 class="text-4xl md:text-5xl font-inter font-black text-[#272831] leading-tight tracking-tighter">
                    Visi & Misi
                </h1>
                <div class="w-16 h-1.5 bg-[#007540] mt-6 rounded-full"></div>
            </div>

            <!-- Area Tabel Data Visi Misi -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto">
                
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Data Visi Misi</h3>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100">
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-16">No</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-48">Judul</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Isi</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping data Visi dan Misi -->
                        @foreach([
                            ['judul' => 'Visi', 'isi' => 'Mewujudkan Desa Cimulang yang maju, sejahtera, mandiri, dan berbasis teknologi digital pada tahun 2026.'],
                            ['judul' => 'Misi', 'isi' => '1. Meningkatkan kualitas tata kelola pemerintahan desa yang transparan. 2. Membangun infrastruktur digital untuk warga. 3. Memberdayakan ekonomi UMKM warga sekitar.']
                        ] as $index => $data)
                            
                        <!-- Baris tabel -->
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            
                            <!-- Nomor Urut -->
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">{{ $index + 1 }}</td>
                            
                            <!-- Judul (Visi / Misi) -->
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">{{ $data['judul'] }}</td>
                            
                            <!-- Isi (Deskripsi) -->
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $data['isi'] }}
                            </td>
                            
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-top">
                                <button class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Edit
                                </button>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>

</body>
</html>