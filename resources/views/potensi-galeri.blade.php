@include('layouts.header', ['title' => 'Potensi & Galeri | Desa Cimulang'])

    <header class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/bg.jpeg') }}" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-gradient-to-b from-[#FFDC2E]/5 via-[#FFDC2E]/5 to-black/60"></div>
            
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="container mx-auto px-8 relative z-10 text-center pt-20 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-[#FFDC2E] text-[#007540] text-xs font-black uppercase tracking-[0.3em] rounded-full mb-6 shadow-lg">
                Jelajah Desa
            </span>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-6 strong-shadow">
                Potensi & Galeri
            </h1>
            <p class="text-white/90 text-lg max-w-2xl mx-auto font-medium leading-relaxed strong-shadow">
                Menjelajahi kekayaan alam, kearifan lokal, dan dokumentasi kegiatan masyarakat yang menjadi kebanggaan Desa Cimulang.
            </p>
        </div>
    </header>

    <section class="py-24 relative">
        <div class="container mx-auto px-8 md:px-24">
            
            <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-12 reveal">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black text-[#272831] mb-4">Potensi Unggulan</h2>
                    <p class="text-slate-500 text-lg">Sumber daya alam dan ekonomi kreatif yang menopang kesejahteraan masyarakat.</p>
                </div>
                <div class="mt-6 md:mt-0">
                    <div class="w-24 h-1.5 bg-desa-yellow rounded-full"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24 reveal">
                
                <div class="bg-white rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 h-full flex flex-col">
                    <div class="h-56 overflow-hidden relative">
                         <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                         <div class="absolute inset-0 bg-gradient-to-t from-desa-dark/60 to-transparent"></div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-black text-[#272831] mb-3 group-hover:text-desa-primary transition-colors">Pertanian Padi</h3>
                        <p class="text-slate-500 leading-relaxed text-sm">
                            Mayoritas penduduk bekerja sebagai petani dengan hasil padi kualitas unggul yang melimpah setiap musim panen.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 h-full flex flex-col">
                    <div class="h-56 overflow-hidden relative">
                         <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                         <div class="absolute inset-0 bg-gradient-to-t from-desa-dark/60 to-transparent"></div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-black text-[#272831] mb-3 group-hover:text-desa-primary transition-colors">Perkebunan Teh</h3>
                        <p class="text-slate-500 leading-relaxed text-sm">
                            Hamparan kebun teh di dataran tinggi yang asri, menghasilkan teh berkualitas ekspor dan menjadi destinasi wisata.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 h-full flex flex-col">
                    <div class="h-56 overflow-hidden relative">
                         <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                         <div class="absolute inset-0 bg-gradient-to-t from-desa-dark/60 to-transparent"></div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-black text-[#272831] mb-3 group-hover:text-desa-primary transition-colors">Kerajinan Tangan</h3>
                        <p class="text-slate-500 leading-relaxed text-sm">
                            Produk kreatif anyaman bambu karya ibu-ibu PKK yang bernilai ekonomis tinggi dan dipasarkan ke luar daerah.
                        </p>
                    </div>
                </div>

            </div>

            <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-12 reveal">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black text-[#272831] mb-4">Galeri Desa</h2>
                    <p class="text-slate-500 text-lg">Dokumentasi kegiatan, keindahan alam, dan aktivitas warga.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 reveal">
                
                <div class="bg-white p-3 rounded-[2.5rem] shadow-lg border border-slate-100 hover:scale-[1.02] transition-transform duration-300">
                    <div class="h-64 rounded-[2rem] overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="px-4 py-3">
                         <span class="text-xs font-bold text-desa-dark block text-center">Kegiatan Gotong Royong</span>
                    </div>
                </div>

                <div class="bg-white p-3 rounded-[2.5rem] shadow-lg border border-slate-100 hover:scale-[1.02] transition-transform duration-300">
                    <div class="h-64 rounded-[2rem] overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="px-4 py-3">
                         <span class="text-xs font-bold text-desa-dark block text-center">Festival Budaya</span>
                    </div>
                </div>

                <div class="bg-white p-3 rounded-[2.5rem] shadow-lg border border-slate-100 hover:scale-[1.02] transition-transform duration-300">
                    <div class="h-64 rounded-[2rem] overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="px-4 py-3">
                         <span class="text-xs font-bold text-desa-dark block text-center">Panen Raya</span>
                    </div>
                </div>

                 <div class="bg-white p-3 rounded-[2.5rem] shadow-lg border border-slate-100 hover:scale-[1.02] transition-transform duration-300">
                    <div class="h-64 rounded-[2rem] overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1495567720989-cebdbdd97913?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="px-4 py-3">
                         <span class="text-xs font-bold text-desa-dark block text-center">Kegiatan Posyandu</span>
                    </div>
                </div>

                <div class="bg-white p-3 rounded-[2.5rem] shadow-lg border border-slate-100 hover:scale-[1.02] transition-transform duration-300">
                    <div class="h-64 rounded-[2rem] overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1495567720989-cebdbdd97913?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="px-4 py-3">
                         <span class="text-xs font-bold text-desa-dark block text-center">Kegiatan Posyandu</span>
                    </div>
                </div>
                
                <div class="bg-white p-3 rounded-[2.5rem] shadow-lg border border-slate-100 hover:scale-[1.02] transition-transform duration-300">
                    <div class="h-64 rounded-[2rem] overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1495567720989-cebdbdd97913?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="px-4 py-3">
                         <span class="text-xs font-bold text-desa-dark block text-center">Kegiatan Posyandu</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

@include('layouts.footer')