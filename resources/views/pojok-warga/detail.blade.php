<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Detail Informasi | Desa Cimulang</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        desa: {
                            primary: '#00923f',
                            accent: '#e11d48',
                            dark: '#064e3b',
                            yellow: '#FFDC2E',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-slate-700 bg-slate-50">

    <nav class="fixed w-full z-50 py-3 bg-white/100 shadow-md backdrop-blur-md border-b border-slate-100"> 
        <div class="container mx-auto px-8 md:px-24 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-2 group cursor-pointer hover:-translate-y-0.5 transition-transform">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                <span class="text-[25px] font-black capitalize text-[#272831]">Desa Cimulang</span>
            </a>
            <a href="{{ url('/') }}" class="text-sm font-bold text-desa-primary hover:text-desa-dark transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda
            </a>
        </div>
    </nav>

    <main class="pt-32 pb-20">
        <div class="container mx-auto px-8 md:px-24">
            
            <div class="max-w-4xl mx-auto bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-slate-100">
                
                <div class="w-full h-[400px] relative">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80" 
                         alt="Cover Berita" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    
                    <span class="absolute top-8 left-8 bg-desa-yellow text-desa-dark text-xs font-black uppercase tracking-widest px-4 py-2 rounded-full shadow-lg">
                        Infrastruktur Digital
                    </span>
                </div>

                <div class="p-8 md:p-12">
                    
                    <h1 class="text-3xl md:text-5xl font-black text-[#272831] mb-6 leading-tight">
                        Pemasangan Titik Hotspot Gratis di Area Publik Desa
                    </h1>

                    <div class="flex flex-wrap items-center gap-6 text-sm text-slate-500 border-b border-slate-100 pb-8 mb-8">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-desa-primary/10 rounded-full flex items-center justify-center text-desa-primary">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="font-bold text-slate-700">Admin Desa</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-desa-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>Senin, 03 Februari 2026</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-desa-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>09:30 WIB</span>
                        </div>
                    </div>

                    <article class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed">
                        <p class="mb-4">
                            Dalam upaya mendukung percepatan transformasi digital dan memberdayakan Usaha Mikro, Kecil, dan Menengah (UMKM), Pemerintah Desa Cimulang secara resmi meluncurkan program pemasangan titik hotspot gratis (Free Wi-Fi) di beberapa area strategis desa.
                        </p>
                        <p class="mb-4">
                            Program ini bertujuan untuk memudahkan warga dalam mengakses informasi, melakukan kegiatan belajar daring bagi siswa, serta memasarkan produk lokal secara online.
                        </p>
                        <h3 class="text-xl font-bold text-[#272831] mt-8 mb-4">Lokasi Titik Hotspot</h3>
                        <ul class="list-disc pl-5 mb-4 space-y-2">
                            <li>Halaman Kantor Desa Cimulang</li>
                            <li>Taman Baca Masyarakat RW 02</li>
                            <li>Area Pasar Desa</li>
                            <li>Balai Warga RW 05</li>
                        </ul>
                        <p>
                            Diharapkan dengan adanya fasilitas ini, kesenjangan digital dapat dikurangi dan kesejahteraan masyarakat Desa Cimulang semakin meningkat melalui pemanfaatan teknologi yang positif.
                        </p>
                    </article>

                </div>
            </div>

        </div>
    </main>

    <footer class="bg-[#007540] text-white pt-20 pb-10 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#FFDC2E] to-transparent"></div>
    
    <div class="container mx-auto px-8 md:px-24">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
            
            <div class="md:col-span-4 space-y-6">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Desa" class="w-12 h-12 object-contain brightness-110">
                    <span class="text-2xl font-black tracking-tighter capitalize">Desa Cimulang</span>
                </div>
                <p class="text-[#FFFFFF] text-sm leading-relaxed text-left">
                    Mewujudkan tata kelola pemerintahan desa yang transparan dan inovatif melalui transformasi digital demi kesejahteraan seluruh masyarakat Cimulang.
                </p>
            </div>

            <div class="md:col-span-2 space-y-6">
    <h4 class="text-sm font-black uppercase tracking-widest text-[#FFDC2E]">Tautan Cepat</h4>
    
    <ul class="space-y-4 text-sm uppercase font-bold">
        <li>
            <a href="{{ url('/') }}" class="text-[#FFFFFF] hover:text-[#FFDC2E] transition-colors duration-300">
                Beranda
            </a>
        </li>
        
        <li x-data="{ open: false }" @mouseleave="open = false" class="relative w-fit">
    <button @click="open = !open" @mouseenter="open = true" 
            class="flex items-center gap-2 text-[#FFFFFF] hover:text-[#FFDC2E] transition-all duration-500 ease-in-out uppercase font-bold focus:outline-none group">
        <span>Profil Desa</span>
        <svg class="w-3 h-3 transition-transform duration-700 ease-in-out" 
             :class="open ? 'rotate-180 text-[#FFDC2E]' : 'group-hover:translate-y-1'" 
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-700"
         x-transition:enter-start="opacity-0 -translate-y-1 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-500"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 -translate-y-1 scale-95"
         /* Menggunakan pt-3 (padding) bukan mt-3 (margin) untuk menjaga koneksi kursor */
         class="pt-3 space-y-4 border-l-2 border-white/20 pl-4 font-bold uppercase tracking-wider origin-top">
        
        <a href="{{ url('/sejarah') }}" class="block text-[10px] text-[#FFFFFF] hover:text-[#FFDC2E] transition-colors duration-500">
            Sejarah
        </a>
        <a href="{{ url('/visi-misi') }}" class="block text-[10px] text-[#FFFFFF] hover:text-[#FFDC2E] transition-colors duration-500">
            Visi & Misi
        </a>
        <a href="{{ url('/pemerintah-desa') }}" class="block text-[10px] text-[#FFFFFF] hover:text-[#FFDC2E] transition-colors duration-500">
            Pemerintah Desa
        </a>
    </div>
</li>

        <li>
            <a href="{{ url('/pojok-warga') }}" class="text-[#FFFFFF] hover:text-[#FFDC2E] transition-colors duration-300">
                Pojok Warga
            </a>
        </li>

        <li>
            <a href="{{ url('/potensi-galeri') }}" class="text-[#FFFFFF] hover:text-[#FFDC2E] transition-colors duration-300">
                Potensi & Galeri
            </a>
        </li>
    </ul>
</div>

            <div class="md:col-span-3 space-y-6">
    <h4 class="text-sm font-black uppercase tracking-widest text-[#FFDC2E]">Kontak Kami</h4>
    <ul class="space-y-4 text-sm text-white"> 
        
        <li class="flex items-start gap-3">
    <a href="https://maps.app.goo.gl/ZyHxhEZQUnWPSWYc7" target="_blank" class="flex items-start gap-3 hover:text-[#FFDC2E] transition-colors duration-300 group">
        
        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-all duration-300 shrink-0">
            <svg class="w-4 h-4 text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
        </div>

        <span class="font-bold pt-1">
            Jl. Raya Cimulang No. 45, Kec. Rancabungur, Kab. Bogor, Jawa Barat.
        </span>
    </a>
</li>

        <li class="flex items-start gap-3">
            <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center gap-3 hover:text-[#FFDC2E] transition-colors duration-300 group">
                <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-all duration-300 shrink-0">
                    <svg class="w-4 h-4 text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold">+62 812-3456-7890</span>
                </div>
            </a>
        </li>

        <li class="flex items-center gap-3">
    <a href="mailto:admin@cimulang.desa.id" class="flex items-center gap-3 hover:text-[#FFDC2E] transition-colors duration-300 group">
        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-all duration-300 shrink-0">
            <svg class="w-4 h-4 text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>
        <span class="font-bold">admin@cimulang.desa.id</span>
    </a>
</li>
    </ul>
</div>

            <div class="md:col-span-3 space-y-10"> 
                <div class="space-y-6">
    <h4 class="text-sm font-black uppercase tracking-widest text-[#FFDC2E]">Jam Pelayanan</h4>
    <div class="space-y-3">
        <div class="flex items-start text-sm">
            <span class="text-white w-32 shrink-0">Senin - Kamis</span>
            <span class="text-white px-2">:</span>
            <span class="font-bold text-white whitespace-nowrap">08:00 - 15:00</span>
        </div>
        
        <div class="flex items-start text-sm">
            <span class="text-white w-32 shrink-0">Jumat</span>
            <span class="text-white px-2">:</span>
            <span class="font-bold text-white whitespace-nowrap">08:00 - 11:30</span>
        </div>
    </div>
</div>

                <div class="space-y-6">
                    <h4 class="text-sm font-black uppercase tracking-widest text-[#FFDC2E]">Ikuti Kami</h4>
                    <ul class="space-y-4 text-sm font-bold">
                        <li>
                            <a href="https://www.instagram.com/desa_cimulang" target="_blank" class="flex items-center gap-3 text-white hover:text-[#FFDC2E] transition-colors group">
                                <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-all">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                                    </svg>
                                </div>
                                <span>@desa_cimulang</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-[#FFFFFF]/30 pt-8 flex justify-center items-center">
            <p class="text-[10px] font-black capitalize tracking-[0.3em] text-[#FFFFFF] text-center">
                © 2026 Desa Cimulang. All rights reserved.
            </p>
        </div>
    </div>
</footer>

</body>
</html>