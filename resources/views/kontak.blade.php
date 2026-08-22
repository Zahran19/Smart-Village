@include('layouts.header', ['title' => 'Kontak Kami | Desa Cimulang'])

    <header class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('bg.jpeg') }}" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-gradient-to-b from-[#FFDC2E]/5 via-[#FFDC2E]/5 to-black/60"></div>
            
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="container mx-auto px-8 relative z-10 text-center pt-20 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-[#FFDC2E] text-desa-primary text-xs font-black uppercase tracking-[0.3em] rounded-full mb-6 shadow-lg">
                Hubungi Kami
            </span>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-6 strong-shadow">
                Kontak Desa
            </h1>
            <p class="text-white/90 text-lg max-w-2xl mx-auto font-medium leading-relaxed strong-shadow">
                Kami siap melayani dan mendengar aspirasi Anda. Silakan hubungi kami melalui saluran informasi berikut.
            </p>
        </div>
    </header>

    <section class="py-24 relative">
        <div class="container mx-auto px-8 md:px-24">
            
            <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-12 reveal">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black text-[#272831] mb-4">Informasi Kontak</h2>
                    <p class="text-slate-500 text-lg">Temukan kami di lokasi berikut atau hubungi melalui media digital.</p>
                </div>
                <div class="mt-6 md:mt-0">
                    <div class="w-24 h-1.5 bg-desa-yellow rounded-full"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24 reveal">
                
                <div class="bg-white rounded-[3rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 text-center">
                    <div class="w-20 h-20 mx-auto bg-desa-light text-desa-primary rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-[#272831] mb-2">Alamat Kantor</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">
                        {{ $contents['alamat']->value }}
                    </p>
                </div>

                <div class="bg-white rounded-[3rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 text-center">
                    <div class="w-20 h-20 mx-auto bg-desa-light text-desa-primary rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-[#272831] mb-2">Email Resmi</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">
                        {{ $contents['email']->value }}
                    </p>
                </div>

                <div class="bg-white rounded-[3rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 group hover:-translate-y-2 transition-transform duration-300 text-center">
                    <div class="w-20 h-20 mx-auto bg-desa-light text-desa-primary rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-[#272831] mb-2">WhatsApp</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">
                        {{ $contents['no_whatsapp']->value }}
                    </p>
                </div>

            </div>

            <div class="text-center mb-12 reveal">
                <h2 class="text-3xl md:text-4xl font-black text-[#272831] mb-4">Kirim Pesan dan Lokasi</h2>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">Sampaikan pesan, saran, atau pertanyaan Anda melalui formulir di bawah ini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 reveal">
                
                <div class="bg-white rounded-[3rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100">
                    <form action="#" class="space-y-6">
                        <div>
                            <label class="block text-desa-dark font-bold text-xs uppercase tracking-widest mb-2">Nama Lengkap</label>
                            <input type="text" placeholder="Masukkan nama..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 placeholder-slate-400 text-slate-700 font-bold focus:outline-none focus:ring-2 focus:ring-desa-primary/50 transition-all">
                        </div>
                        <div>
                            <label class="block text-desa-dark font-bold text-xs uppercase tracking-widest mb-2">Email / Telepon</label>
                            <input type="text" placeholder="Masukkan kontak..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 placeholder-slate-400 text-slate-700 font-bold focus:outline-none focus:ring-2 focus:ring-desa-primary/50 transition-all">
                        </div>
                        <div>
                            <label class="block text-desa-dark font-bold text-xs uppercase tracking-widest mb-2">Isi Pesan</label>
                            <textarea rows="4" placeholder="Tuliskan pesan Anda..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 placeholder-slate-400 text-slate-700 font-bold focus:outline-none focus:ring-2 focus:ring-desa-primary/50 transition-all resize-none"></textarea>
                        </div>
                        
                        <button class="w-full bg-desa-primary hover:bg-desa-dark text-white font-black py-4 rounded-2xl uppercase tracking-[0.2em] text-xs shadow-lg transform hover:-translate-y-1 transition-all">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <div class="bg-white rounded-[3rem] p-4 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 h-full min-h-[500px] flex flex-col">
                    <div class="flex-grow w-full h-full rounded-[2.5rem] overflow-hidden relative group">
                        <iframe 
                            src="{{ $contents['google_maps_embed']->value }}" 
                            class="w-full h-full absolute inset-0" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <span class="bg-white/90 backdrop-blur-md px-8 py-3 rounded-full font-black text-desa-dark shadow-xl text-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                Lokasi Kami
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@include('layouts.footer')