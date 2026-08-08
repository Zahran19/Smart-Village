<!-- File: resources/views/partials/sidebar.blade.php -->
<aside class="w-72 h-full bg-white flex flex-col flex-shrink-0 px-8 py-10 shadow-[20px_0_50px_rgba(0,0,0,0.03)] z-20 relative">
            
    <!-- Logo Gambar & Judul Teks -->
    <div class="flex items-center justify-center gap-2 mb-14">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-auto object-contain fallback-logo text-[8px]">
        <div class="flex flex-col justify-center">
            <h2 class="text-[#272831] font-inter font-black text-xl leading-none tracking-tighter">Cimulang</h2>
            <span class="text-[#007540] font-inter uppercase tracking-[0.3em] text-[9px] font-black mt-1">Smart Village</span>
        </div>
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex flex-col gap-3">
        
        <!-- Dashboard -->
        <a href="{{ url('/admin/dashboard') }}" 
           class="{{ request()->is('admin/dashboard') ? 'bg-[#007540] text-white shadow-lg shadow-[#007540]/30 hover:scale-105' : 'text-[#929397] hover:text-[#007540] hover:bg-slate-50' }} px-6 py-4 rounded-full font-inter font-black text-xs uppercase tracking-widest transition-all">
            Dashboard
        </a>
        
        <!-- Beranda -->
        <a href="{{ url('/admin/beranda') }}" 
           class="{{ request()->is('admin/beranda') ? 'bg-[#007540] text-white shadow-lg shadow-[#007540]/30 hover:scale-105' : 'text-[#929397] hover:text-[#007540] hover:bg-slate-50' }} px-6 py-4 rounded-full font-inter font-black text-xs uppercase tracking-widest transition-all">
            Beranda
        </a>
        
        <!-- Menu Dropdown Profil Desa -->
        @php
            $isProfilAktif = request()->is('admin/visi-misi') || request()->is('admin/sejarah-desa') || request()->is('admin/pemerintah-desa');
        @endphp
        <div class="flex flex-col">
            <!-- Tombol Dropdown dengan JS Toggle untuk transisi mulus -->
            <button type="button" 
                    onclick="
                        const submenu = document.getElementById('submenu-profil');
                        const icon = document.getElementById('icon-profil');
                        submenu.classList.toggle('max-h-0');
                        submenu.classList.toggle('max-h-48');
                        submenu.classList.toggle('opacity-0');
                        submenu.classList.toggle('opacity-100');
                        submenu.classList.toggle('mt-0');
                        submenu.classList.toggle('mt-2');
                        submenu.classList.toggle('pointer-events-none');
                        icon.classList.toggle('rotate-180');
                    " 
                    class="w-full flex items-center justify-between {{ $isProfilAktif ? 'text-[#272831] bg-slate-50' : 'text-[#929397] hover:text-[#007540] hover:bg-slate-50' }} px-6 py-4 rounded-full font-inter font-black text-xs uppercase tracking-widest transition-all focus:outline-none group">
                Profil Desa
                <svg id="icon-profil" class="w-4 h-4 transition-transform duration-300 {{ $isProfilAktif ? 'text-[#007540] rotate-180' : 'group-hover:translate-y-1' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            
            <!-- Sub-menu dengan transisi height & opacity (Accordion Effect) -->
            <div id="submenu-profil" class="flex flex-col ml-8 gap-1 border-l-2 {{ $isProfilAktif ? 'border-[#007540]/20' : 'border-slate-100' }} pl-4 transition-all duration-300 ease-in-out overflow-hidden {{ $isProfilAktif ? 'max-h-48 opacity-100 mt-2' : 'max-h-0 opacity-0 mt-0 pointer-events-none' }}">
                <a href="{{ url('/admin/visi-misi') }}" class="{{ request()->is('admin/visi-misi') ? 'text-[#007540] font-black' : 'text-[#929397] font-bold hover:text-[#007540]' }} font-inter text-[10px] uppercase tracking-widest py-2 transition-colors">Visi Misi</a>
                
                <a href="{{ url('/admin/sejarah-desa') }}" class="{{ request()->is('admin/sejarah-desa') ? 'text-[#007540] font-black' : 'text-[#929397] font-bold hover:text-[#007540]' }} font-inter text-[10px] uppercase tracking-widest py-2 transition-colors">Sejarah Desa</a>
                
                <a href="{{ url('/admin/pemerintah-desa') }}" class="{{ request()->is('admin/pemerintah-desa') ? 'text-[#007540] font-black' : 'text-[#929397] font-bold hover:text-[#007540]' }} font-inter text-[10px] uppercase tracking-widest py-2 transition-colors">Pemerintah Desa</a>
            </div>
        </div>

        <!-- Pojok Warga -->
        <a href="{{ url('/admin/pojok-warga') }}" 
           class="{{ request()->is('admin/pojok-warga') ? 'bg-[#007540] text-white shadow-lg shadow-[#007540]/30 hover:scale-105' : 'text-[#929397] hover:text-[#007540] hover:bg-slate-50' }} px-6 py-4 rounded-full font-inter font-black text-xs uppercase tracking-widest transition-all">
            Pojok Warga
        </a>
        
        <!-- Potensi & Galeri -->
        <a href="{{ url('/admin/potensi-galeri') }}" 
           class="{{ request()->is('admin/potensi-galeri') ? 'bg-[#007540] text-white shadow-lg shadow-[#007540]/30 hover:scale-105' : 'text-[#929397] hover:text-[#007540] hover:bg-slate-50' }} px-6 py-4 rounded-full font-inter font-black text-xs uppercase tracking-widest transition-all">
            Potensi & Galeri
        </a>
        
        <!-- Kontak -->
        <a href="{{ url('/admin/kontak') }}" 
           class="{{ request()->is('admin/kontak') ? 'bg-[#007540] text-white shadow-lg shadow-[#007540]/30 hover:scale-105' : 'text-[#929397] hover:text-[#007540] hover:bg-slate-50' }} px-6 py-4 rounded-full font-inter font-black text-xs uppercase tracking-widest transition-all">
            Kontak
        </a>
        <!-- Log Out -->
        <a href="{{ url('/admin/logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="w-full block mt-2 text-left text-[#929397] hover:text-red-500 hover:bg-red-50 px-6 py-4 rounded-full font-inter font-black text-xs uppercase tracking-widest transition-all">
            Log Out
        </a>
        <form id="logout-form" method="POST" action="{{ url('/admin/logout') }}" class="hidden">
            @csrf
        </form>
    </nav>
    
    <!-- Ornamen Background Sidebar -->
    <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#FFDC2E]/20 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2 -z-10"></div>
</aside>