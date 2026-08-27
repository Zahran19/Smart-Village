@include('layouts.header', ['title' => 'Pemerintah Desa | Desa Cimulang'])

    <header class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1600&q=80" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-gradient-to-b from-[#FFDC2E]/5 via-[#FFDC2E]/5 to-black/60"></div>
            
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="container mx-auto px-8 relative z-10 text-center pt-20 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-[#FFDC2E] text-[#007540] text-xs font-black uppercase tracking-[0.3em] rounded-full mb-6 shadow-lg">
                Profil Desa
            </span>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-6 strong-shadow">
                Pemerintah Desa
            </h1>
            <p class="text-white/90 text-lg max-w-2xl mx-auto font-medium leading-relaxed strong-shadow">
                Mengenal lebih dekat struktur organisasi dan perangkat desa yang berdedikasi melayani masyarakat Desa Cimulang.
            </p>
        </div>
    </header>

    <section class="py-24 relative">
        <div class="container mx-auto px-8 md:px-24">
            
            <div class="bg-white rounded-[3rem] p-10 md:p-16 shadow-[0_20px_50px_rgba(0,0,0,0.05)] mb-20 border border-slate-100 reveal text-center">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-black text-[#272831] mb-6">Struktur Organisasi</h2>
                    <p class="text-slate-500 leading-relaxed text-lg mb-8">
                        Pemerintahan Desa Cimulang dipimpin oleh Kepala Desa dan dibantu oleh perangkat desa yang terdiri dari Sekretaris Desa, Kepala Seksi (Kasi), Kepala Urusan (Kaur), dan Kepala Dusun yang bekerja secara sinergis untuk kemajuan desa.
                    </p>
                    <div class="w-24 h-1.5 bg-desa-yellow mx-auto rounded-full"></div>
                </div>
            </div>

            @php
                $anggota = json_decode($contents['struktur_organisasi']->value ?? '[]', true);
            @endphp

            @if (count($anggota) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 md:gap-10">
                    @foreach ($anggota as $item)
                        <div class="reveal group h-full">
                            <div class="bg-white rounded-[3rem] p-8 text-center shadow-[0_10px_30px_rgba(0,0,0,0.05)] border border-slate-100 h-full hover:-translate-y-2 transition-transform duration-300">
                                <div class="relative w-32 h-32 mx-auto mb-6">
                                    {{-- Warna background berbeda untuk Kepala Desa --}}
                                    <div class="absolute inset-0 
                                        {{ strpos(strtolower($item['jabatan'] ?? ''), 'kepala desa') !== false ? 'bg-desa-yellow' : 'bg-desa-light' }} 
                                        rounded-full rotate-6 group-hover:rotate-12 transition-transform duration-500">
                                    </div>
                                    <div class="relative w-full h-full rounded-full overflow-hidden border-4 border-white shadow-lg">
                                        <img src="{{ $item['profile_img'] ?? asset('images/default-avatar.jpg') }}" 
                                            alt="{{ $item['nama'] ?? 'Anggota' }}" 
                                            class="w-full h-full">
                                    </div>
                                </div>
                                <h3 class="text-xl font-black text-[#272831] mb-1">{{ $item['nama'] ?? '' }}</h3>
                                <p class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-4">{{ $item['jabatan'] ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-slate-500">Belum ada data struktur organisasi.</p>
            @endif
        </div>
    </section>

@include('layouts.footer')