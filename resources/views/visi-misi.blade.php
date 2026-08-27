@include('layouts.header', ['title' => 'Visi & Misi | Desa Cimulang'])

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
                Visi & Misi
            </h1>
            <p class="text-white/90 text-lg max-w-2xl mx-auto font-medium leading-relaxed strong-shadow">
                Arah dan tujuan pembangunan Desa Cimulang menuju masyarakat yang mandiri, sejahtera, dan berdaya saing.
            </p>
        </div>
    </header>

    <section class="py-24 relative">
        <div class="container mx-auto px-8 md:px-24">
            
            <div class="bg-white rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] mb-12 border border-slate-100 reveal overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-12 min-h-[350px]">
                    <div class="md:col-span-4 bg-[#FFDC2E] p-10 flex items-center justify-center relative group overflow-hidden">
                         <div class="absolute -right-4 -bottom-4 w-32 h-32 bg-white/20 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                         <h2 class="text-5xl md:text-6xl font-black text-[#007540] tracking-tighter relative z-10">Visi</h2>
                    </div>
                    
                    <div class="md:col-span-8 p-10 md:p-14 flex flex-col justify-center relative">
                        <div class="absolute top-8 left-8 text-desa-primary/10 font-serif text-8xl leading-none">“</div>
                        <div class="relative z-10 pl-6">
                            <p class="text-xl md:text-3xl font-bold text-[#272831] leading-relaxed italic">
                                {{ $contents['visi']->value }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 reveal">
                
                <div class="order-2 md:order-1 md:col-span-8 bg-white rounded-[3rem] p-10 md:p-14 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 flex flex-col justify-center relative h-full">
                    <div class="absolute top-8 right-8 text-desa-primary/10 font-serif text-8xl leading-none">”</div>
                    
                    <div class="relative z-10">
                        <ul class="space-y-6">
                            @foreach (json_decode($contents['misi']->value) as $index => $item)
                                <li class="flex items-start gap-5 group">
                                    <span class="flex-shrink-0 w-10 h-10 rounded-2xl bg-desa-light text-desa-primary flex items-center justify-center font-black text-sm group-hover:bg-desa-primary group-hover:text-white transition-colors">{{ $index + 1 }}</span>
                                    <p class="text-slate-600 font-medium text-lg leading-relaxed pt-1">{{ $item }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="order-1 md:order-2 md:col-span-4 h-full min-h-[300px]">
                    <div class="bg-[#FFDC2E] rounded-[3rem] p-10 flex items-center justify-center shadow-lg h-full relative overflow-hidden group hover:-translate-y-2 transition-transform duration-300">
                        <div class="absolute -left-4 -top-4 w-32 h-32 bg-white/20 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover opacity-10 mix-blend-multiply">
                        <h2 class="text-5xl md:text-6xl font-black text-[#007540] tracking-tighter relative z-10">Misi</h2>
                    </div>
                </div>

            </div>
        </div>
    </section>

@include('layouts.footer')