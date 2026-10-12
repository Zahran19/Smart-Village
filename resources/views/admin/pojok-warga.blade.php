<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pojok Warga Admin | Smart Village Desa Cimulang</title>
    <link rel="icon" href="{{ asset('images/fav-icon.png') }}" type="image/png">
    
    <!-- Memanggil CSS Tailwind bawaan Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Memanggil font Inter dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-50 font-inter text-slate-800 antialiased overflow-hidden">

    <!-- Wrapper Utama: Dikunci tinggi 100vh dan tidak boleh overflow keluar window -->
    <div class="flex h-screen w-full overflow-hidden">
        
        <!-- ================= MEMANGGIL SIDEBAR MASTER ================= -->
        @include('partials.sidebar')

        <!-- ================= KONTEN UTAMA ================= -->
        <main class="flex-1 h-full px-8 md:px-16 py-10 overflow-y-auto overflow-x-hidden relative custom-scrollbar pb-20">
            
            <!-- Ornamen Background Konten -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#007540]/5 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>

            <!-- Judul Halaman -->
            <div class="mb-12 relative z-10">
                <h4 class="text-[#007540] font-inter font-extrabold uppercase tracking-[0.4em] text-xs mb-2">
                    Pojok Warga
                </h4>
                <h1 class="text-4xl md:text-5xl font-inter font-black text-[#272831] leading-tight tracking-tighter">
                    Pojok Warga
                </h1>
                <div class="w-16 h-1.5 bg-[#007540] mt-6 rounded-full"></div>
            </div>

            <!-- Tabel Data Pojok Warga -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full overflow-x-auto mb-10">
                
                <div class="w-full flex justify-end mb-6">
                    <button onclick="openAddBeritaModal()" class="inline-block px-8 py-4 bg-[#FFDC2E] text-[#007540] font-inter font-black rounded-full uppercase tracking-[0.2em] text-[10px] hover:bg-[#007540] hover:text-[#FFDC2E] transition-all shadow-lg hover:-translate-y-1 focus:outline-none">
                        Tambah Berita Baru
                    </button>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100">
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-16">No</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-24">Foto</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-56">Judul</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap">Deskripsi Singkat</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap w-24 text-center">Status</th>
                            <th class="py-5 px-4 text-[#929397] font-inter font-black text-[10px] uppercase tracking-widest whitespace-nowrap text-center w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($beritaList as $index => $berita)
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                            <!-- Nomor Urut -->
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">{{ $index + 1 }}</td>
                            
                            <!-- Foto -->
                            <td class="py-5 px-4 align-top">
                                <div class="w-16 h-12 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shadow-sm shrink-0">
                                    <img src="{{ $berita->img ? asset($berita->img) : asset('images/pojok_warga/default.svg') }}" 
                                         alt="{{ $berita->title }}" 
                                         class="w-full h-full object-cover"
                                         onerror="this.src='{{ asset('images/pojok_warga/default.svg') }}'">
                                </div>
                            </td>
                            
                            <!-- Judul -->
                            <td class="py-5 px-4 text-sm font-inter font-bold text-[#272831] align-top">
                                <div>{{ $berita->title }}</div>
                                @if($berita->date_released)
                                    <div class="text-[10px] text-slate-400 font-medium mt-1">{{ \Carbon\Carbon::parse($berita->date_released)->isoFormat('D MMM Y') }}</div>
                                @endif
                            </td>
                            
                            <!-- Deskripsi Singkat -->
                            <td class="py-5 px-4 text-sm font-inter font-medium text-[#929397] leading-relaxed align-top">
                                {{ $berita->short_desc }}
                            </td>

                            <!-- Status -->
                            <td class="py-5 px-4 align-top text-center whitespace-nowrap">
                                @if($berita->status === 'published')
                                    <span class="inline-block px-3 py-1 bg-green-100 text-green-700 font-bold text-[10px] rounded-full uppercase tracking-wider">Release</span>
                                @else
                                    <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 font-bold text-[10px] rounded-full uppercase tracking-wider">Draft</span>
                                @endif
                            </td>
                            
                            <!-- Tombol Action -->
                            <td class="py-5 px-4 align-top text-center">
                                <div class="flex flex-row items-center justify-center gap-3">
                                    <button type="button" onclick="openBeritaModal({{ $berita->id }}, '{{ addslashes($berita->title) }}', '{{ addslashes($berita->short_desc) }}', '{{ addslashes($berita->content) }}', '{{ $berita->status }}', '{{ $berita->img ? asset($berita->img) : '' }}')" class="bg-white border-2 border-[#FFDC2E] text-[#007540] hover:bg-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:outline-none cursor-pointer">
                                        Edit
                                    </button>

                                    <button type="button" onclick="openDeleteBeritaModal({{ $berita->id }}, '{{ addslashes($berita->title) }}')" class="whitespace-nowrap px-6 py-2.5 bg-transparent border-2 border-red-500 text-red-500 font-inter font-black rounded-full uppercase tracking-[0.2em] text-[10px] hover:bg-red-500 hover:text-white transition-colors focus:outline-none cursor-pointer">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-[#929397] font-medium text-sm">Belum ada berita di Pojok Warga.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>
    </div>

    <!-- CDN SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- success notif --}}
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#007540', 
            background: '#ffffff',
            customClass: {
                popup: 'rounded-[2rem] border-[6px] border-slate-50', 
                title: 'font-inter font-black text-[#272831]',
                htmlContainer: 'font-inter text-sm text-[#929397]',
                confirmButton: 'font-inter font-black text-xs uppercase tracking-widest rounded-full px-8 py-3 shadow-md'
            }
        });
    </script>
    @endif

    {{-- error notif --}}
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#ef4444', 
            customClass: {
                popup: 'rounded-[2rem] border-[6px] border-slate-50',
                title: 'font-inter font-black text-[#272831]',
                htmlContainer: 'font-inter text-sm text-[#929397]',
                confirmButton: 'font-inter font-black text-xs uppercase tracking-widest rounded-full px-8 py-3 shadow-md'
            }
        });
    </script>
    @endif

</body>
</html>

@include('partials.modals')
