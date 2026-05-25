@include('layouts.header', ['title' => 'Pojok Warga | Desa Cimulang'])

    <header class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('bg.jpeg') }}" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-gradient-to-b from-[#FFDC2E]/5 via-[#FFDC2E]/5 to-black/60"></div>
            
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="container mx-auto px-8 relative z-10 text-center pt-20 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-[#FFDC2E] text-[#007540] text-xs font-black uppercase tracking-[0.3em] rounded-full mb-6 shadow-lg">
                Informasi Desa
            </span>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-6 strong-shadow">
                Pojok Warga
            </h1>
            <p class="text-white/90 text-lg max-w-2xl mx-auto font-medium leading-relaxed strong-shadow">
                Pusat informasi terkini, pengumuman, dan berita seputar kegiatan masyarakat Desa Cimulang.
            </p>
        </div>
    </header>

    <section class="py-24 relative">
        <div class="container mx-auto px-8 md:px-24">
            
            <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-12 reveal">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black text-[#272831] mb-4">Berita Terbaru</h2>
                    <p class="text-slate-500 text-lg">Ikuti perkembangan terbaru dan kegiatan yang terjadi di lingkungan kita.</p>
                </div>
                <div class="mt-6 md:mt-0">
                    <div class="w-24 h-1.5 bg-desa-yellow rounded-full"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 mb-24 reveal">
                
                <div class="bg-white rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 h-full flex flex-col">
                    <div class="h-64 overflow-hidden relative">
                         <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                         <div class="absolute top-6 left-6 bg-desa-primary text-white px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg">
                            Pembangunan
                         </div>
                    </div>
                    <div class="p-8 md:p-10 flex flex-col flex-grow">
                        <span class="text-xs font-bold text-slate-400 mb-3 block flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            12 Februari 2026
                        </span>
                        <h3 class="text-2xl font-black text-[#272831] mb-4 leading-tight group-hover:text-desa-primary transition-colors">Pembangunan Jalan Desa Tahap 2 Dimulai</h3>
                        <p class="text-slate-500 leading-relaxed mb-8 flex-grow">
                            Pemerintah desa mulai mengerjakan pengaspalan jalan di Dusun 3 untuk memperlancar akses ekonomi warga setempat.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-desa-primary font-black text-xs uppercase tracking-widest hover:gap-4 transition-all">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 h-full flex flex-col">
                    <div class="h-64 overflow-hidden relative">
                         <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                         <div class="absolute top-6 left-6 bg-desa-yellow text-desa-dark px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg">
                            Ekonomi
                         </div>
                    </div>
                    <div class="p-8 md:p-10 flex flex-col flex-grow">
                        <span class="text-xs font-bold text-slate-400 mb-3 block flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            10 Februari 2026
                        </span>
                        <h3 class="text-2xl font-black text-[#272831] mb-4 leading-tight group-hover:text-desa-primary transition-colors">Pelatihan Digital Marketing untuk UMKM</h3>
                        <p class="text-slate-500 leading-relaxed mb-8 flex-grow">
                            Workshop gratis bagi pelaku usaha mikro untuk memasarkan produk lokal ke pasar nasional melalui marketplace.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-desa-primary font-black text-xs uppercase tracking-widest hover:gap-4 transition-all">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>

            </div>

            <div class="reveal">
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="text-2xl font-black text-[#272831]">Arsip Berita</h2>
                    <div class="h-[1px] bg-slate-200 flex-grow"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="bg-white rounded-[2.5rem] p-4 pr-8 flex gap-6 items-center shadow-sm hover:shadow-lg border border-slate-100 transition-all hover:-translate-y-1 group cursor-pointer">
                        <div class="w-24 h-24 flex-shrink-0 rounded-[1.5rem] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-desa-primary mb-1 block">05 Feb 2026</span>
                            <h4 class="text-lg font-bold text-[#272831] leading-tight mb-2 group-hover:text-desa-primary transition-colors">Musyawarah Rencana Pembangunan Desa</h4>
                            <p class="text-xs text-slate-500 line-clamp-1">Agenda tahunan untuk menyerap aspirasi warga.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] p-4 pr-8 flex gap-6 items-center shadow-sm hover:shadow-lg border border-slate-100 transition-all hover:-translate-y-1 group cursor-pointer">
                        <div class="w-24 h-24 flex-shrink-0 rounded-[1.5rem] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-desa-primary mb-1 block">01 Feb 2026</span>
                            <h4 class="text-lg font-bold text-[#272831] leading-tight mb-2 group-hover:text-desa-primary transition-colors">Panen Raya Padi Organik</h4>
                            <p class="text-xs text-slate-500 line-clamp-1">Hasil panen meningkat 20% berkat metode baru.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] p-4 pr-8 flex gap-6 items-center shadow-sm hover:shadow-lg border border-slate-100 transition-all hover:-translate-y-1 group cursor-pointer">
                        <div class="w-24 h-24 flex-shrink-0 rounded-[1.5rem] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-desa-primary mb-1 block">28 Jan 2026</span>
                            <h4 class="text-lg font-bold text-[#272831] leading-tight mb-2 group-hover:text-desa-primary transition-colors">Posyandu Balita & Lansia</h4>
                            <p class="text-xs text-slate-500 line-clamp-1">Pemeriksaan kesehatan rutin bulanan.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] p-4 pr-8 flex gap-6 items-center shadow-sm hover:shadow-lg border border-slate-100 transition-all hover:-translate-y-1 group cursor-pointer">
                        <div class="w-24 h-24 flex-shrink-0 rounded-[1.5rem] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1495567720989-cebdbdd97913?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-desa-primary mb-1 block">20 Jan 2026</span>
                            <h4 class="text-lg font-bold text-[#272831] leading-tight mb-2 group-hover:text-desa-primary transition-colors">Kerja Bakti Bersih Sungai</h4>
                            <p class="text-xs text-slate-500 line-clamp-1">Gotong royong membersihkan aliran sungai.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

@include('layouts.footer')