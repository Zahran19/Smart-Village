@include('layouts.header', ['title' => 'Pojok Warga | Desa Cimulang'])

    <header class="relative h-[50vh] sm:h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/bg.jpeg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-[#FFDC2E]/5 via-[#FFDC2E]/5 to-black/60"></div>
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="container mx-auto px-6 sm:px-8 relative z-10 text-center pt-16 sm:pt-20 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-[#FFDC2E] text-[#007540] text-[10px] sm:text-xs font-black uppercase tracking-[0.2em] sm:tracking-[0.3em] rounded-full mb-4 sm:mb-6 shadow-lg">
                Informasi Desa
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-black text-white tracking-tighter mb-4 sm:mb-6 strong-shadow">
                Pojok Warga
            </h1>
            <p class="text-white/90 text-base sm:text-lg max-w-2xl mx-auto font-medium leading-relaxed strong-shadow px-4">
                Pusat informasi terkini, pengumuman, dan berita seputar kegiatan masyarakat Desa Cimulang.
            </p>
        </div>
    </header>

    <section class="py-16 sm:py-24 relative">
        <div class="container mx-auto px-6 sm:px-8 md:px-24">

            {{-- Berita Terbaru --}}
            <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-8 sm:mb-12 reveal">
                <div class="max-w-2xl">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#272831] mb-3 sm:mb-4">Berita Terbaru</h2>
                    <p class="text-slate-500 text-sm sm:text-base md:text-lg">Ikuti perkembangan terbaru dan kegiatan yang terjadi di lingkungan kita.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="w-16 sm:w-24 h-1.5 bg-desa-yellow rounded-full"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 md:gap-10 mb-16 sm:mb-24 reveal">
                @forelse($latestNews as $news)
                    <div class="bg-white rounded-[2rem] md:rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 h-full flex flex-col">
                        <div class="h-48 sm:h-56 md:h-64 overflow-hidden relative">
                            <img src="{{ asset($news->img ?? 'images/pojok_warga/default.svg') }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                 alt="{{ $news->title }}">
                        </div>
                        <div class="p-6 sm:p-8 md:p-10 flex flex-col flex-grow">
                            <span class="text-[10px] sm:text-xs font-bold text-slate-400 mb-2 sm:mb-3 block flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ \Carbon\Carbon::parse($news->date_released)->isoFormat('D MMMM YYYY') }}
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-[#272831] mb-3 sm:mb-4 leading-tight group-hover:text-desa-primary transition-colors">
                                {{ $news->title }}
                            </h3>
                            <p class="text-slate-500 text-sm sm:text-base leading-relaxed mb-6 sm:mb-8 flex-grow">{{ $news->short_desc }}</p>
                            <a href="{{ route('pojok-warga.detail', $news->slug) }}"
                               class="inline-flex items-center gap-2 text-desa-primary font-black text-[10px] sm:text-xs uppercase tracking-widest hover:gap-4 transition-all">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 text-center text-slate-500 py-10">Belum ada berita terbaru.</div>
                @endforelse
            </div>

            {{-- Arsip Berita --}}
            <div class="reveal">
                <div class="flex items-center gap-4 mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-black text-[#272831]">Arsip Berita</h2>
                    <div class="h-[1px] bg-slate-200 flex-grow"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    @forelse($archives as $news)
                        <a href="{{ route('pojok-warga.detail', $news->slug) }}"
                           class="bg-white rounded-[1.5rem] sm:rounded-[2.5rem] p-3 sm:p-4 pr-4 sm:pr-8 flex gap-4 sm:gap-6 items-center shadow-sm hover:shadow-lg border border-slate-100 transition-all hover:-translate-y-1 group cursor-pointer">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-shrink-0 rounded-[1rem] sm:rounded-[1.5rem] overflow-hidden">
                                <img src="{{ asset($news->img ?? 'images/pojok_warga/default.svg') }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                     alt="{{ $news->title }}">
                            </div>
                            <div class="flex-grow">
                                <span class="text-[9px] sm:text-[10px] font-black uppercase tracking-widest text-desa-primary mb-1 block">
                                    {{ \Carbon\Carbon::parse($news->date_released)->isoFormat('D MMM YYYY') }}
                                </span>
                                <!-- Teks title sedikit lebih kecil di mobile -->
                                <h4 class="text-base sm:text-lg font-bold text-[#272831] leading-tight mb-1 sm:mb-2 group-hover:text-desa-primary transition-colors">
                                    {{ $news->title }}
                                </h4>
                                <p class="text-[11px] sm:text-xs text-slate-500 line-clamp-1 sm:line-clamp-2">{{ $news->short_desc }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-1 md:col-span-2 text-center text-slate-500 py-10">Tidak ada arsip berita.</div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

@include('layouts.footer')