<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintah Desa Admin | Smart Village Desa Cimulang</title>
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
                    Profil Desa
                </h4>
                <h1 class="text-4xl md:text-5xl font-inter font-black text-[#272831] leading-tight tracking-tighter">
                    Pemerintah Desa
                </h1>
                <div class="w-16 h-1.5 bg-[#007540] mt-6 rounded-full"></div>
            </div>

            <!-- Tabel 1: Perangkat Desa -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto mb-10">
                
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Perangkat Desa</h3>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100">
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-16">No</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-48">Jabatan</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Nama Lengkap</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Foto</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping data Perangkat Desa -->
                        @foreach([
                            ['jabatan' => 'Kepala Desa', 'nama' => 'Bapak Budi Santoso'],
                            ['jabatan' => 'Sekretaris Desa', 'nama' => 'Ibu Siti Aminah']
                        ] as $index => $perangkat)
                            
                        <!-- Baris tabel -->
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            
                            <!-- Nomor Urut -->
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-middle">{{ $index + 1 }}</td>
                            
                            <!-- Jabatan -->
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-middle">{{ $perangkat['jabatan'] }}</td>
                            
                            <!-- Nama Lengkap -->
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-middle">
                                {{ $perangkat['nama'] }}
                            </td>

                            <!-- Foto -->
                            <td class="py-5 px-4 align-middle">
                                <div class="w-12 h-12 bg-slate-100 border border-slate-200 rounded-xl flex items-center justify-center text-[10px] font-bold text-slate-400">Foto</div>
                            </td>
                            
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-middle">
                                <button class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Edit
                                </button>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tabel 2: Sekilas tentang Desa -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto">
                
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Sekilas tentang Desa</h3>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100">
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-16">No</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-64">Kategori</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Jumlah</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping data Sekilas Desa -->
                        @foreach([
                            ['kategori' => 'Luas Wilayah', 'jumlah' => '500 Ha'],
                            ['kategori' => 'Jumlah Dusun', 'jumlah' => '5 Dusun']
                        ] as $index => $sekilas)
                            
                        <!-- Baris tabel -->
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            
                            <!-- Nomor Urut -->
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-middle">{{ $index + 1 }}</td>
                            
                            <!-- Kategori -->
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-middle">{{ $sekilas['kategori'] }}</td>
                            
                            <!-- Jumlah -->
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-middle">
                                {{ $sekilas['jumlah'] }}
                            </td>
                            
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-middle">
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