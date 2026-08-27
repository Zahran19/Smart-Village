@include('layouts.header', ['title' => 'Sejarah | Desa Cimulang'])

    <header class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/bg.jpeg') }}" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-gradient-to-b from-[#FFDC2E]/5 via-[#FFDC2E]/5 to-black/60"></div>
            
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <div class="container mx-auto px-8 relative z-10 text-center pt-20 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-[#FFDC2E] text-[#007540] text-xs font-black uppercase tracking-[0.3em] rounded-full mb-6 shadow-lg">
                Profil Desa
            </span>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-6 strong-shadow">
                Sejarah Desa
            </h1>
            <p class="text-white/90 text-lg max-w-2xl mx-auto font-medium leading-relaxed strong-shadow">
                Menelusuri jejak langkah para leluhur dan perkembangan Desa Cimulang dari masa ke masa hingga menjadi Smart Village.
            </p>
        </div>
    </header>

    <section class="py-24 relative">
        <div class="container mx-auto px-8 md:px-24">
            
            <div class="bg-white rounded-[3rem] p-10 md:p-16 shadow-[0_20px_50px_rgba(0,0,0,0.05)] mb-12 border border-slate-100 reveal">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-black text-[#272831] mb-6">Awal Mula Terbentuk</h2>
                    <p class="text-slate-500 leading-relaxed text-lg mb-8">
                        {{ $contents['awal_mula_terbentuk']->value }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                
                <div class="reveal h-full min-h-[400px]">
                    <div class="bg-desa-light rounded-[3rem] overflow-hidden shadow-lg h-full relative group">
                        <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?auto=format&fit=crop&w=800&q=80" 
                             alt="Arsip Foto Desa" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-desa-dark/80 to-transparent flex items-end p-10">
                            <span class="text-white font-bold text-xl">Arsip Foto 1990</span>
                        </div>
                    </div>
                </div>

                <div class="reveal h-full">
                    <div class="bg-white rounded-[3rem] p-10 md:p-14 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 h-full flex flex-col justify-center">
                        <h3 class="text-2xl font-black text-[#272831] mb-4">Masa Perjuangan</h3>
                        <p class="text-slate-500 leading-relaxed">
                            {{ $contents['masa_perjuangan']->value }}
                        </p>
                    </div>
                </div>

                <div class="reveal h-full">
                    <div class="bg-white rounded-[3rem] p-10 md:p-14 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 h-full flex flex-col justify-center">
                        <h3 class="text-2xl font-black text-[#272831] mb-4">Pemekaran Wilayah</h3>
                        <p class="text-slate-500 leading-relaxed">
                            {{ $contents['pemekaran_wilayah']->value }}
                        </p>
                    </div>
                </div>

                <div class="reveal h-full min-h-[400px]">
                    <div class="bg-[#FFDC2E] rounded-[3rem] overflow-hidden shadow-lg h-full relative group flex items-center justify-center">
                         <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=800&q=80" 
                          alt="Peta Desa Lama" 
                          class="w-full h-full object-cover opacity-80 mix-blend-multiply transition-transform duration-700 group-hover:scale-110">
                         <div class="absolute inset-0 flex items-center justify-center">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@include('layouts.footer')