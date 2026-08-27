<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi Misi Admin | Smart Village Desa Cimulang</title>
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
        <main class="flex-1 h-full px-8 md:px-16 py-10 overflow-y-auto overflow-x-hidden relative custom-scrollbar">
            
            <!-- Ornamen Background Konten -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#007540]/5 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>

            <!-- Topbar (Pencarian & Profil) -->
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
                    Visi & Misi
                </h1>
                <div class="w-16 h-1.5 bg-[#007540] mt-6 rounded-full"></div>
            </div>

            <!-- Area Tabel Data Visi -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto">
                <form action="{{ url('/admin/visi') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Data Visi</h3>
                    </div>
                    <div class="mb-4">
                        <textarea name="visi" rows="5" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Ketik visi di sini!" required>{{ $contents['visi']->value }}</textarea>
                    </div>
                    <button type="submit" class="bg-[#FFDC2E] text-[#007540] hover:bg-[#007540] hover:text-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-6 py-3 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Update Visi
                    </button>
                </form>
            </div>
            <!-- Area Tabel Data Misi -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto">
                
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Data Misi</h3>

                    <!-- Tombol Tambah Misi Baru -->
                    <button type="button" onclick="openAddModal()" class="bg-[#FFDC2E] text-[#007540] hover:bg-[#007540] hover:text-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-6 py-3 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Tambah Misi Baru
                    </button>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100">
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-16">No</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Isi</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping data Visi dan Misi -->
                        @foreach(json_decode($contents['misi']->value) as $index => $item)
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">{{ $index + 1 }}</td>
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $item }}
                            </td>
                            
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-top">
                                <div class="flex gap-2">
                                    <button type="button" onclick="openModal({{ $index }}, '{{ $item }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                        Edit
                                    </button>
                                    <button type="button" onclick="openDeleteModal({{ $index }})" class="bg-white border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
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



