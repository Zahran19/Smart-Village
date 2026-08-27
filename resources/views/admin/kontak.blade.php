<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Admin | Smart Village Desa Cimulang</title>
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
                    Kontak
                </h4>
                <h1 class="text-4xl md:text-5xl font-inter font-black text-[#272831] leading-tight tracking-tighter">
                    Kontak Desa
                </h1>
                <div class="w-16 h-1.5 bg-[#007540] mt-6 rounded-full"></div>
            </div>

            <!-- Tabel Data Kontak -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto mb-10">
                <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tight">Data Kontak Desa</h3>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100">
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-16">No</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-48">Kategori Kontak</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Isi Kontak</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap text-center w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">1</td>
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">Alamat</td>
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $contents['alamat']->value }}
                            </td>
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-top text-center">
                                <button type="button" onclick="openEditKontakModal('Alamat', 'alamat', '{{ addslashes($contents['alamat']->value) }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">2</td>
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">Email</td>
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $contents['email']->value }}
                            </td>
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-top text-center">
                                <button type="button" onclick="openEditKontakModal('Email', 'email', '{{ addslashes($contents['email']->value) }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">3</td>
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">Whatsapp</td>
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $contents['whatsapp']->value }}
                            </td>
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-top text-center">
                                <button type="button" onclick="openEditKontakModal('Whatsapp', 'whatsapp', '{{ addslashes($contents['whatsapp']->value) }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">4</td>
                            <td class="py-5 px-4 text-sm font-inter fon-bold text-[#272831] align-top">Instagram</td>
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $contents['instagram']->value }}
                            </td>
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-top text-center">
                                <button type="button" onclick="openEditKontakModal('Instagram', 'instagram', '{{ addslashes($contents['instagram']->value) }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">5</td>
                            <td class="py-5 px-4 text-sm font-inter fon-bold text-[#272831] align-top">Link Embed Google Maps</td>
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $contents['google_maps_embed']->value }}
                            </td>
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-top text-center">
                                <button type="button" onclick="openEditKontakModal('Link Embed Google Maps', 'google_maps_embed', '{{ addslashes($contents['google_maps_embed']->value) }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>
    </div>

</body>
</html>

@include('partials.modals')
