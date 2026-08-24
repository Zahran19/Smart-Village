<footer class="bg-[#007540] text-white pt-20 pb-10 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-desa-yellow to-transparent"></div>
    
    <div class="container mx-auto px-8 md:px-24">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
            
            <div class="md:col-span-4 space-y-6">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('logo.png') }}" alt="Logo Desa" class="w-12 h-12 object-contain brightness-110">
                    <span class="text-2xl font-black tracking-tighter capitalize">Desa Cimulang</span>
                </div>
                <p class="text-white text-sm leading-relaxed text-left">
                    Mewujudkan tata kelola pemerintahan desa yang transparan dan inovatif melalui transformasi digital demi kesejahteraan seluruh masyarakat Cimulang.
                </p>
            </div>

            <div class="md:col-span-2 space-y-6">
                <h4 class="text-sm font-black uppercase tracking-widest text-desa-yellow">Tautan Cepat</h4>
                
                <ul class="space-y-4 text-sm uppercase font-bold">
                    <li>
                        <a href="{{ url('/') }}" class="transition-colors duration-300 {{ request()->is('/') ? 'text-desa-yellow' : 'text-white hover:text-desa-yellow' }}">
                            Beranda
                        </a>
                    </li>
                    
                    <li x-data="{ open: false }" @mouseleave="open = false" class="relative w-fit">
                        <button @click="open = !open" @mouseenter="open = true" 
                                class="flex items-center gap-2 transition-all duration-300 focus:outline-none uppercase font-bold {{ request()->is('sejarah*') || request()->is('visi-misi*') || request()->is('pemerintah-desa*') ? 'text-desa-yellow' : 'text-white hover:text-desa-yellow' }}">
                            <span>Profil Desa</span>
                            <svg class="w-3 h-3 transition-transform duration-300" 
                                 :class="open ? 'rotate-180' : ''" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-2"
                             class="pt-3 space-y-2 border-l-2 border-white/20 pl-4 font-bold uppercase tracking-wider origin-top"
                             style="display: none;">
                            
                            <a href="{{ url('/sejarah') }}" 
                               class="block px-4 py-2 rounded-lg transition-colors {{ request()->is('sejarah') ? 'bg-desa-yellow text-[#007540] font-black' : 'text-white hover:bg-desa-yellow hover:text-[#007540]' }}">
                               Sejarah
                            </a>
                            <a href="{{ url('/visi-misi') }}" 
                               class="block px-4 py-2 rounded-lg transition-colors {{ request()->is('visi-misi') ? 'bg-desa-yellow text-[#007540] font-black' : 'text-white hover:bg-desa-yellow hover:text-[#007540]' }}">
                               Visi & Misi
                            </a>
                            <a href="{{ url('/pemerintah-desa') }}" 
                               class="block px-4 py-2 rounded-lg transition-colors {{ request()->is('pemerintah-desa') ? 'bg-desa-yellow text-[#007540] font-black' : 'text-white hover:bg-desa-yellow hover:text-[#007540]' }}">
                               Pemerintah Desa
                            </a>
                        </div>
                    </li>

                    <li>
                        <a href="{{ url('/pojok-warga') }}" class="transition-colors duration-300 {{ request()->is('pojok-warga*') ? 'text-desa-yellow' : 'text-white hover:text-desa-yellow' }}">
                            Pojok Warga
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/potensi-galeri') }}" class="transition-colors duration-300 {{ request()->is('potensi-galeri*') ? 'text-desa-yellow' : 'text-white hover:text-desa-yellow' }}">
                            Potensi & Galeri
                        </a>
                    </li>
                </ul>
            </div>

            <div class="md:col-span-3 space-y-6">
                <h4 class="text-sm font-black uppercase tracking-widest text-desa-yellow">Kontak Kami</h4>
                <ul class="space-y-4 text-sm text-white"> 
                    <li>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($kontak_contents['alamat']->value) }}" target="_blank" class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 shrink-0 text-desa-yellow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="font-bold pt-1 leading-snug">{{ $kontak_contents['alamat']->value }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kontak_contents['whatsapp']->value) }}" target="_blank" class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 shrink-0 text-desa-yellow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="font-bold pt-0.5">{{ $kontak_contents['whatsapp']->value }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="mailto:{{ $kontak_contents['email']->value }}" class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 shrink-0 text-desa-yellow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-bold pt-0.5">{{ $kontak_contents['email']->value }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="md:col-span-3 space-y-10"> 
                <div class="space-y-6">
                    <h4 class="text-sm font-black uppercase tracking-widest text-desa-yellow">Jam Pelayanan</h4>
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
                    <h4 class="text-sm font-black uppercase tracking-widest text-desa-yellow">Ikuti Kami</h4>
                    <ul class="space-y-4 text-sm font-bold">
                        <li>
                            <a href="https://www.instagram.com/{{ $kontak_contents['instagram']->value ?? '-' }}/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 group transition-colors duration-300 hover:text-desa-yellow">
                                <svg class="w-5 h-5 shrink-0 text-desa-yellow transition-transform duration-300 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                                <span>{{ $kontak_contents['instagram']->value }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-white/30 pt-8 flex justify-center items-center">
            <p class="text-[10px] font-black capitalize tracking-[0.3em] text-white text-center">
                © 2026 Desa Cimulang. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<script>
    function reveal() {
        const reveals = document.querySelectorAll(".reveal");
        for (let i = 0; i < reveals.length; i++) {
            let windowHeight = window.innerHeight;
            let elementTop = reveals[i].getBoundingClientRect().top;
            let elementVisible = 100;
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            }
        }
    }
    window.addEventListener("scroll", reveal);
    document.addEventListener("DOMContentLoaded", reveal);
</script>