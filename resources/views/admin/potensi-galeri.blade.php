<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potensi & Galeri Admin | Smart Village Desa Cimulang</title>
    <link rel="icon" href="{{ asset('images/fav-icon.png') }}" type="image/png">
    
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
        <main class="flex-1 h-full px-8 md:px-16 py-10 overflow-y-auto overflow-x-hidden relative custom-scrollbar pb-20">
            
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

            <!-- Judul Halaman -->
            <div class="mb-12 relative z-10">
                <h4 class="text-[#007540] font-inter font-extrabold uppercase tracking-[0.4em] text-xs mb-2">
                    Potensi & Galeri
                </h4>
                <h1 class="text-4xl md:text-5xl font-inter font-black text-[#272831] leading-tight tracking-tighter">
                    Potensi & Galeri Desa
                </h1>
                <div class="w-16 h-1.5 bg-[#007540] mt-6 rounded-full"></div>
            </div>

            <!-- Tabel 1: Potensi Desa -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto mb-10">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tight">Data Potensi Desa</h3>
                    <!-- Tombol Tambah Potensi -->
                    <button type="button" onclick="openAddPotensiModal()" class="bg-[#FFDC2E] text-[#007540] hover:bg-[#007540] hover:text-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-6 py-3 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Tambah Potensi Desa
                    </button>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100">
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-16">No</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-48">Judul Potensi</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Rangkuman Singkat</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-24">Foto</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap text-center w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping data Potensi -->
                        @foreach ($contents['potensi'] as $index => $potensi)
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">{{ $index + 1 }}</td>
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">{{ $potensi['title'] }}</td>
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $potensi['short_desc'] }}
                            </td>
                            <td class="py-5 px-4 align-top">
                                <!-- Placeholder Foto dengan styling senada -->
                                <div class="w-16 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-[10px] text-slate-400 font-bold border-2 border-slate-200 border-dashed"><img src="{{ asset($potensi['img']) }}"></div>
                            </td>
                            <td class="py-5 px-4 align-top text-center">
                                <!-- Flex container buat tombol Edit & Delete -->
                                <div class="flex gap-2 justify-center">
                                    <button type="button" onclick="openEditPotensiModal({{$potensi['id']}}, '{{ $potensi['title'] }}', '{{ addslashes($potensi['short_desc']) }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                        Edit
                                    </button>
                                    <button type="button" onclick="openDeletePotensiModal({{ $potensi['id'] }})" class="bg-white border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tabel 2: Galeri Desa -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto mb-10">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tight">Galeri Desa</h3>
                    
                    <!-- Tombol Tambah Galeri -->
                    <button type="button" onclick="openAddGaleriModal()" class="bg-[#FFDC2E] text-[#007540] hover:bg-[#007540] hover:text-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-6 py-3 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Tambah Galeri Baru
                    </button>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100">
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-16">No</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-32">Foto</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Judul</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap text-center w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping data Galeri -->
                        @foreach ($contents['galeri'] as $index => $galeri)
                            
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">{{ $index + 1 }}</td>
                            <td class="py-5 px-4 align-top">
                                <!-- Placeholder Foto dengan ukuran lebih besar -->
                                <div class="w-24 h-16 bg-slate-100 rounded-xl flex items-center justify-center text-xs text-slate-400 font-bold border-2 border-slate-200 border-dashed"><img src="{{ asset($galeri['img']) }}"></div>
                            </td>
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $galeri['title'] }}
                            </td>
                            <td class="py-5 px-4 align-top text-center">
                            <!-- Tombol Edit & Delete berdampingan -->
                            <div class="flex gap-2 justify-center">
                                <button type="button" onclick="openEditGaleriModal({{$galeri['id']}}, '{{ addslashes($galeri['title']) }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Edit
                                </button>
                                <button type="button" onclick="openDeleteGaleriModal({{ $galeri['id'] }})" class="bg-white border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Delete
                                </button>
                            </div>
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

@include('partials.modals')
