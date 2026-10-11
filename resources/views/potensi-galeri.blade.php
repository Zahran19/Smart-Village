@include('layouts.header', ['title' => 'Potensi & Galeri | Desa Cimulang'])

    <header class="relative h-[50vh] sm:h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/bg.jpeg') }}" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-gradient-to-b from-[#FFDC2E]/5 via-[#FFDC2E]/5 to-black/60"></div>
            
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="container mx-auto px-6 sm:px-8 relative z-10 text-center pt-16 sm:pt-20 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-[#FFDC2E] text-[#007540] text-[10px] sm:text-xs font-black uppercase tracking-[0.2em] sm:tracking-[0.3em] rounded-full mb-4 sm:mb-6 shadow-lg">
                Jelajah Desa
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-black text-white tracking-tighter mb-4 sm:mb-6 strong-shadow">
                Potensi & Galeri
            </h1>
            <p class="text-white/90 text-base sm:text-lg max-w-2xl mx-auto font-medium leading-relaxed strong-shadow px-4">
                Menjelajahi kekayaan alam, kearifan lokal, dan dokumentasi kegiatan masyarakat yang menjadi kebanggaan Desa Cimulang.
            </p>
        </div>
    </header>

    <section class="py-16 sm:py-24 relative">
        <div class="container mx-auto px-6 sm:px-8 md:px-24">
            
            <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-8 sm:mb-12 reveal">
                <div class="max-w-2xl">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#272831] mb-3 sm:mb-4">Potensi Unggulan</h2>
                    <p class="text-slate-500 text-sm sm:text-base md:text-lg">Sumber daya alam dan ekonomi kreatif yang menopang kesejahteraan masyarakat.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="w-16 sm:w-24 h-1.5 bg-desa-yellow rounded-full"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-16 sm:mb-24 reveal">
                @foreach ($contents['potensi'] as $potensi)
                <div class="bg-white rounded-[2rem] md:rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 h-full flex flex-col">
                    <div class="h-48 sm:h-56 overflow-hidden relative">
                         <img src="{{ $potensi['img'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                         <div class="absolute inset-0 bg-gradient-to-t from-desa-dark/60 to-transparent"></div>
                    </div>
                    <div class="p-6 md:p-8 flex flex-col flex-grow">
                        <h3 class="text-xl md:text-2xl font-black text-[#272831] mb-2 sm:mb-3 group-hover:text-desa-primary transition-colors">{{ $potensi['title'] }}</h3>
                        <p class="text-slate-500 leading-relaxed text-xs sm:text-sm">
                            {{ $potensi['short_desc'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-8 sm:mb-12 reveal">
                <div class="max-w-2xl">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#272831] mb-3 sm:mb-4">Galeri Desa</h2>
                    <p class="text-slate-500 text-sm sm:text-base md:text-lg">Dokumentasi kegiatan, keindahan alam, dan aktivitas warga.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 reveal">
                @foreach ($contents['potensi'] as $potensi)
                <div class="bg-white p-2 md:p-3 rounded-[1.5rem] md:rounded-[2.5rem] shadow-lg border border-slate-100 hover:scale-[1.02] transition-transform duration-300">
                    <div class="h-48 sm:h-56 md:h-64 rounded-[1rem] md:rounded-[2rem] overflow-hidden relative group">
                        <img src="{{ $potensi['img'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="px-3 md:px-4 py-2 md:py-3">
                         <span class="text-[10px] sm:text-xs font-bold text-desa-dark block text-center">{{ $potensi['title']}}</span>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

@include('layouts.footer')