<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <title>{{ $title ?? $fooder_contents['beranda']['title']->value }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        desa: {
                            primary: '#007540', /* Hijau baru */
                            accent: '#e11d48',  
                            dark: '#007540',    /* Diseragamkan ke hijau baru */
                            muted: '#64748b',   
                            light: '#f0fdf4',   
                            yellow: '#FFDC2E',  /* Kuning sudah sesuai */
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-15px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); }
        .reveal.active { opacity: 1; transform: translateY(0); }
        
        .strong-shadow { 
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4), 0 1px 3px rgba(0, 0, 0, 0.2); 
        }

        .hero-overlay {
            background: linear-gradient(to bottom, 
                rgba(0, 117, 64, 0.7) 0%, /* Disesuaikan ke RGB dari #007540 */
                rgba(0, 117, 64, 0.15) 40%, /* Disesuaikan ke RGB dari #007540 */
                rgba(15, 23, 42, 0.5) 70%, 
                rgba(255, 255, 255, 0.4) 100% 
            );
        }
    
    </style>
</head>
<body class="font-sans antialiased text-slate-700 bg-slate-50" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50) ? true : false">

    <nav x-data="{ mobileMenuOpen: false }" class="fixed w-full z-50 transition-all duration-500 ease-in-out" :class="scrolled ? 'py-3' : 'py-4'"> 
        
        <div class="absolute inset-0 transition-all duration-500 ease-in-out" :class="scrolled || mobileMenuOpen ? 'bg-white/100 shadow-md backdrop-blur-md border-b border-slate-100' : 'bg-white/0 backdrop-blur-sm border-transparent'"></div>

        <div class="container mx-auto px-8 md:px-24 flex justify-between items-center relative z-10">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2 group cursor-pointer transition-transform duration-300 hover:-translate-y-0.5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Desa" class="w-10 h-10 object-contain">
                <span class="text-[25px] font-black capitalize transition-colors duration-500" :class="scrolled || mobileMenuOpen ? 'text-[#272831]' : 'text-white'">
                    Desa Cimulang
                </span>
            </a>
            
            <!-- ================= TOMBOL HAMBURGER MOBILE ================= -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden focus:outline-none transition-colors duration-300" :class="scrolled || mobileMenuOpen ? 'text-[#272831]' : 'text-white'">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <!-- Icon Garis Tiga (Buka) -->
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    <!-- Icon X (Tutup) -->
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" style="display: none;"></path>
                </svg>
            </button>
            <!-- =========================================================== -->

            <!-- ================= MENU DESKTOP ================= -->
            <ul class="hidden md:flex space-x-8 items-center font-bold text-[12px] uppercase tracking-widest">
                
                <li>
                    <a href="{{ url('/') }}" 
                       class="transition-all duration-300 hover:!text-desa-yellow {{ request()->is('/') ? '!text-desa-yellow' : '' }}" 
                       :class="scrolled ? 'text-[#272831]' : 'text-white'">
                       Beranda
                    </a>
                </li>

                <li class="relative" x-data="{ open: false }" @mouseleave="open = false">
                    <button @mouseenter="open = true" 
                            class="flex items-center gap-1 transition-all duration-300 hover:!text-desa-yellow focus:outline-none py-4 uppercase {{ request()->is('sejarah*') || request()->is('visi-misi*') || request()->is('pemerintah-desa*') ? '!text-desa-yellow' : '' }}" 
                            :class="scrolled ? 'text-[#272831]' : 'text-white'">
                        Profil Desa
                        <svg class="w-3 h-3 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="3" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         @mouseenter="open = true"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform translate-y-2"
                         class="absolute top-full left-1/2 -translate-x-1/2 w-56 bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border border-white/50 overflow-hidden py-2" 
                         style="display: none;">
                        
                        <a href="{{ url('/sejarah') }}" class="block px-6 py-3 transition-colors {{ request()->is('sejarah') ? 'bg-desa-yellow text-desa-primary font-black' : 'text-[#272831] hover:bg-desa-yellow hover:text-desa-primary' }}">Sejarah</a>
                        <a href="{{ url('/visi-misi') }}" class="block px-6 py-3 transition-colors {{ request()->is('visi-misi') ? 'bg-desa-yellow text-desa-primary font-black' : 'text-[#272831] hover:bg-desa-yellow hover:text-desa-primary' }}">Visi & Misi</a>
                        <a href="{{ url('/pemerintah-desa') }}" class="block px-6 py-3 transition-colors {{ request()->is('pemerintah-desa') ? 'bg-desa-yellow text-desa-primary font-black' : 'text-[#272831] hover:bg-desa-yellow hover:text-desa-primary' }}">Pemerintah Desa</a>
                    </div>
                </li>

                <li>
                    <a href="{{ url('/pojok-warga') }}" 
                       class="transition-all duration-300 hover:!text-desa-yellow {{ request()->is('pojok-warga*') ? '!text-desa-yellow' : '' }}" 
                       :class="scrolled ? 'text-[#272831]' : 'text-white'">
                       Pojok Warga
                    </a>
                </li>

                <li>
                    <a href="{{ url('/potensi-galeri') }}" 
                       class="transition-all duration-300 hover:!text-desa-yellow {{ request()->is('potensi-galeri*') ? '!text-desa-yellow' : '' }}" 
                       :class="scrolled ? 'text-[#272831]' : 'text-white'">
                       Potensi & Galeri
                    </a>
                </li>

                <li>
                    <a href="{{ url('/kontak') }}" 
                       class="transition-all duration-300 hover:!text-desa-yellow {{ request()->is('kontak*') ? '!text-desa-yellow' : '' }}" 
                       :class="scrolled ? 'text-[#272831]' : 'text-white'">
                       Kontak
                    </a>
                </li>
            </ul>
        </div>

        <!-- ================= MENU MOBILE DROPDOWN ================= -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="absolute top-full left-0 w-full bg-white shadow-2xl border-t border-slate-100 md:hidden z-0" 
             style="display: none;">
            
            <ul class="flex flex-col py-2 px-8 font-bold text-[12px] uppercase tracking-widest text-[#272831]">
                
                <li>
                    <a href="{{ url('/') }}" class="block py-4 border-b border-slate-100 {{ request()->is('/') ? 'text-[#007540]' : 'hover:text-[#FFDC2E]' }}">
                        Beranda
                    </a>
                </li>

                <!-- Dropdown Profil Desa di Mobile -->
                <li x-data="{ openProfilMobile: false }">
                    <button @click="openProfilMobile = !openProfilMobile" class="w-full flex justify-between items-center py-4 border-b border-slate-100 focus:outline-none {{ request()->is('sejarah*') || request()->is('visi-misi*') || request()->is('pemerintah-desa*') ? 'text-[#007540]' : 'hover:text-[#FFDC2E]' }}">
                        Profil Desa
                        <svg class="w-4 h-4 transition-transform duration-300" :class="openProfilMobile ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openProfilMobile" class="bg-slate-50 rounded-xl mt-2 mb-2 overflow-hidden" style="display: none;">
                        <a href="{{ url('/sejarah') }}" class="block px-6 py-3 border-b border-slate-200/50 {{ request()->is('sejarah') ? 'text-[#007540]' : 'text-slate-500 hover:text-[#007540]' }}">Sejarah</a>
                        <a href="{{ url('/visi-misi') }}" class="block px-6 py-3 border-b border-slate-200/50 {{ request()->is('visi-misi') ? 'text-[#007540]' : 'text-slate-500 hover:text-[#007540]' }}">Visi & Misi</a>
                        <a href="{{ url('/pemerintah-desa') }}" class="block px-6 py-3 {{ request()->is('pemerintah-desa') ? 'text-[#007540]' : 'text-slate-500 hover:text-[#007540]' }}">Pemerintah Desa</a>
                    </div>
                </li>

                <li>
                    <a href="{{ url('/pojok-warga') }}" class="block py-4 border-b border-slate-100 {{ request()->is('pojok-warga*') ? 'text-[#007540]' : 'hover:text-[#FFDC2E]' }}">
                        Pojok Warga
                    </a>
                </li>

                <li>
                    <a href="{{ url('/potensi-galeri') }}" class="block py-4 border-b border-slate-100 {{ request()->is('potensi-galeri*') ? 'text-[#007540]' : 'hover:text-[#FFDC2E]' }}">
                        Potensi & Galeri
                    </a>
                </li>

                <li>
                    <a href="{{ url('/kontak') }}" class="block py-4 {{ request()->is('kontak*') ? 'text-[#007540]' : 'hover:text-[#FFDC2E]' }}">
                        Kontak
                    </a>
                </li>
            </ul>
        </div>
    </nav>