@include('layouts.header', ['title' => 'Smart Village | Desa Cimulang'])

<section id="beranda" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('bg.jpeg') }}"
             alt="Landscape Desa"
             class="w-full h-full object-cover">
        
        <div class="absolute inset-0 bg-gradient-to-b from-[#FFDC2E]/1 via-[#FFDC2E]/1 to-black/50"></div>
        
        <div class="absolute inset-0 bg-black/40 "></div>
    </div>

    <div class="container mx-auto px-8 md:px-24 relative z-10 animate-fade-in-up text-center">
        <div class="max-w-10xl mx-auto pt-40 pb-20">
            <span class="inline-block px-8 py-2.5 bg-[#FFDC2E] text-[#007540] text-xl font-inter font-bold capitalize tracking-[0.2em] rounded-full mb-10 shadow-lg">
                Selamat Datang
            </span>

            <div class="flex flex-col mb-10">
                <h1 class="text-3xl md:text-6xl font-inter font-bold text-white leading-none tracking-tighter mb-4 strong-shadow">
                    Smart Village
                </h1>
                <span class="text-3xl md:text-8xl font-black text-white capitalize drop-shadow-2xl">
                    {{ $contents['hero_title']->value }}
                </span>
            </div>

            <p class="text-xl md:text-1xl text-white font-inter mb-12 leading-relaxed max-w-1xl mx-auto strong-shadow">
                "Membangun masa depan desa dengan harmoni alam dan kecanggihan teknologi."
            </p>

            <a href="#tentang" class="inline-flex items-center justify-between min-w-[280px] gap-4 px-8 py-4 bg-[#5c6b38]/70 backdrop-blur-sm border-[3px] border-white text-white font-semibold text-xl rounded-full shadow-2xl transition-all hover:-translate-y-1 hover:scale-105 hover:bg-[#5c6b38]/90 group">
                <span class="flex-grow text-center pl-2">Jelajahi Desa</span>
                <svg class="w-6 h-6 transition-transform group-hover:translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="3" d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<section id="tentang" class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-8 md:px-24 reveal">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            <div class="relative">
                <div class="absolute -top-12 -left-12 w-48 h-48 bg-desa-light/50 rounded-full -z-10 blur-2xl"></div>
                
                <div class="rounded-[2.5rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.1)] transition-transform duration-700 hover:scale-[1.02]">
                    <img src="https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=800&q=80" 
                         alt="Kantor Desa" 
                         class="w-full h-[400px] md:h-[500px] object-cover">
                </div>
            </div>

            <div class="space-y-8">
                <div>
                    <h4 class="text-desa-primary font-extrabold uppercase tracking-[0.4em] text-xs mb-4">
                        Profil Desa
                    </h4>
                    <h2 class="text-5xl md:text-6xl font-black text-[#272831] leading-tight tracking-tighter">
                        Desa Cimulang
                    </h2>
                    <div class="w-16 h-1.5 bg-desa-primary mt-6 rounded-full"></div>
                </div>

                <div class="space-y-6">
                    <h3 class="text-xl md:text-2xl font-extrabold text-[#272831] leading-snug">
                        Menuju Transformasi Desa Digital 2026
                    </h3>
                    
                    <p class="text-lg text-[#929397] leading-relaxed font-medium text-justify">
                        "Desa Cimulang merupakan kawasan yang menggabungkan kearifan lokal agraris dengan inovasi digital. Terletak di jantung Jawa Barat, kami berkomitmen untuk menciptakan pelayanan publik yang transparan, akuntabel, dan berbasis teknologi untuk seluruh warga."
                    </p>
                </div>

                <div class="pt-4">
                    <a href="{{ url('/sejarah') }}" class="flex items-center gap-3 text-desa-primary font-bold text-sm uppercase tracking-widest group">
                        Baca Selengkapnya
                        <div class="w-10 h-10 rounded-full border-2 border-desa-primary flex items-center justify-center group-hover:bg-desa-primary group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="pojok-warga" class="py-24 bg-slate-50/50">
    <div class="container mx-auto px-8 md:px-24 reveal text-center mb-20">
        <h2 class="text-5xl md:text-6xl font-black text-[#272831] mb-4 tracking-tighter">Pojok Warga</h2>
        <p class="text-desa-primary uppercase tracking-[0.4em] text-[11px] font-black">Kanal Informasi Terpadu</p>
    </div>

    <div class="container mx-auto px-8 md:px-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            
            <div class="bg-white p-4 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-white hover:shadow-2xl transition-all duration-500 group reveal">
                <div class="w-full h-64 rounded-[2.5rem] overflow-hidden mb-8">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80" 
                         alt="Digital" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="px-6 pb-8 text-center">
                    <h3 class="text-xl font-black text-[#272831] mb-4 uppercase tracking-tight">Infrastruktur Digital</h3>
                    <p class="text-[#929397] text-sm leading-relaxed mb-8">Pemasangan titik hotspot gratis di area publik desa untuk mendukung digitalisasi UMKM warga Cimulang.</p>
                    <a href="{{ url('/pojok-warga/detail') }}" class="block w-full py-4 border-2 border-slate-50 group-hover:border-desa-primary group-hover:bg-desa-primary group-hover:text-white rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] transition-all text-center">
    Detail
</a>
                </div>
            </div>

            <div class="bg-white p-4 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-white hover:shadow-2xl transition-all duration-500 group reveal">
                <div class="w-full h-64 rounded-[2.5rem] overflow-hidden mb-8">
                    <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=600&q=80" 
                         alt="Pangan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="px-6 pb-8 text-center">
                    <h3 class="text-xl font-black text-[#272831] mb-4 uppercase tracking-tight">Ketahanan Pangan</h3>
                    <p class="text-[#929397] text-sm leading-relaxed mb-8">Program pembibitan padi unggul untuk meningkatkan kualitas panen kelompok tani di wilayah Cimulang.</p>
                    <button class="w-full py-4 border-2 border-slate-50 group-hover:border-desa-primary group-hover:bg-desa-primary group-hover:text-white rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] transition-all">Detail</button>
                </div>
            </div>

            <div class="bg-white p-4 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-white hover:shadow-2xl transition-all duration-500 group reveal">
                <div class="w-full h-64 rounded-[2.5rem] overflow-hidden mb-8">
                    <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=600&q=80" 
                         alt="Budaya" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="px-6 pb-8 text-center">
                    <h3 class="text-xl font-black text-[#272831] mb-4 uppercase tracking-tight">Festival Budaya</h3>
                    <p class="text-[#929397] text-sm leading-relaxed mb-8">Persiapan pesta rakyat tahunan sebagai wujud syukur atas harmoni kehidupan desa dan tradisi lokal.</p>
                    <button class="w-full py-4 border-2 border-slate-50 group-hover:border-desa-primary group-hover:bg-desa-primary group-hover:text-white rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] transition-all">Detail</button>
                </div>
            </div>

        </div>

        <div class="mt-16 text-center reveal">
            <a href="{{ url('/pojok-warga') }}" class="inline-block px-10 py-4 border-2 border-[#272831]/10 hover:border-desa-primary hover:bg-desa-primary hover:text-white rounded-full text-[10px] font-black uppercase tracking-[0.3em] transition-all duration-300">
                Lihat Selengkapnya
            </a>
        </div>

    </div>
</section>

<section id="galeri-foto" class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-8 md:px-24 reveal text-center mb-20">
        <h2 class="text-5xl md:text-6xl font-black text-[#272831] mb-4 tracking-tighter">Potensi & Galeri Desa</h2>
        <p class="text-desa-primary uppercase tracking-[0.4em] text-[11px] font-black">Jejak Keindahan di Setiap Sudut Cimulang</p>
        
        <div class="w-20 h-1.5 bg-desa-primary mx-auto mt-6 rounded-full"></div>
    </div>

    <div class="container mx-auto px-8 md:px-24">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 reveal">
            
            <div class="group relative aspect-square rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.1)] border-[10px] border-slate-50 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=800&q=80" 
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-desa-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <svg class="w-6 h-6 text-desa-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                </div>
            </div>

            <div class="group relative aspect-square rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.1)] border-[10px] border-slate-50 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=800&q=80" 
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-desa-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <svg class="w-6 h-6 text-desa-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                </div>
            </div>

            <div class="group relative aspect-square rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.1)] border-[10px] border-slate-50 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1464375117522-1311d6a5b81f?auto=format&fit=crop&w=800&q=80" 
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-desa-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <svg class="w-6 h-6 text-desa-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                </div>
            </div>

            <div class="group relative aspect-square rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.1)] border-[10px] border-slate-50 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=800&q=80" 
                         class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-desa-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <svg class="w-6 h-6 text-desa-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-20 text-center reveal">
            <a href="{{ url('/potensi-galeri') }}" class="inline-block px-10 py-4 border-2 border-[#272831]/10 hover:border-desa-primary hover:bg-desa-primary hover:text-white rounded-full text-[10px] font-black uppercase tracking-[0.3em] transition-all duration-300">
                Lihat Semua Galeri
            </a>
        </div>
    </div>
</section>

<section class="py-20 bg-[#F8FAFC80] text-slate-900 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-40 h-40 bg-slate-200 rounded-full blur-2xl translate-y-1/2 -translate-x-1/2 opacity-50"></div>

    <div class="container mx-auto px-8 md:px-24 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-black mb-6 tracking-tight text-slate-900">
            Butuh Layanan atau Punya Pertanyaan?
        </h2>
        
        <p class="text-slate-600 text-lg mb-8 max-w-2xl mx-auto font-medium">
            Perangkat Desa Cimulang siap melayani Anda. Silakan hubungi kami atau datang langsung ke kantor desa.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/kontak') }}" class="inline-block px-8 py-4 bg-desa-yellow text-[#007540] font-black rounded-full uppercase tracking-widest text-xs hover:bg-[#007540] hover:text-desa-yellow transition-all shadow-lg hover:-translate-y-1">
    Hubungi Kami
</a>
            
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center justify-center gap-2 px-8 py-4 border-2 border-slate-300 hover:border-slate-900 hover:bg-desa-yellow hover:text-white text-slate-700 font-black rounded-full uppercase tracking-widest text-xs transition-all">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.017-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                Chat WhatsApp
            </a>
        </div>
    </div>
</section>

@include('layouts.footer')