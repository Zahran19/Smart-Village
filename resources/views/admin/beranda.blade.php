<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin | Smart Village Desa Cimulang</title>
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
        <main class="flex-1 h-full px-8 md:px-16 py-10 overflow-y-auto overflow-x-hidden relative custom-scrollbar">
            
            <!-- Ornamen Background Konten -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#007540]/5 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>

            <!-- Judul Halaman -->
            <div class="mb-12 relative z-10">
                <h4 class="text-[#007540] font-inter font-extrabold uppercase tracking-[0.4em] text-xs mb-2">
                    Manajemen Data
                </h4>
                <h1 class="text-4xl md:text-5xl font-inter font-black text-[#272831] leading-tight tracking-tighter">
                    Beranda
                </h1>
                <div class="w-16 h-1.5 bg-[#007540] mt-6 rounded-full"></div>
            </div>

            <!-- Area Tabel Data Beranda -->
            <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white relative z-10 w-full mb-10">
                
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tighter">Kustomisasi Konten Hero</h3>
                        <p class="text-sm font-inter text-[#929397] mt-1">Ubah judul, deskripsi, dan gambar latar belakang halaman utama</p>
                    </div>
                </div>

                <!-- Form Update Hero -->
                <form action="{{ url('/admin/beranda/update-hero') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                    @csrf
                    @method('PATCH') 

                    <!-- Input Judul Hero -->
                    <div>
                        <label class="block text-sm font-inter font-bold text-[#272831] mb-2">Judul Utama (Title)</label>
                        <!-- Value diisi dummy sesuai frontend, nanti ganti pake variabel dari DB -->
                        <input type="text" name="hero_title" value="Smart Village Desa Cimulang" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>
                    </div>

                    <!-- Input Deskripsi Hero -->
                    <div>
                        <label class="block text-sm font-inter font-bold text-[#272831] mb-2">Deskripsi Singkat</label>
                        <textarea name="hero_description" rows="3" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>Mewujudkan tata kelola pemerintahan yang transparan dan inovatif melalui transformasi digital demi kesejahteraan seluruh masyarakat Cimulang.</textarea>
                    </div>

                    <!-- Input Background Image -->
                    <div>
                        <label class="block text-sm font-inter font-bold text-[#272831] mb-2">Gambar Background Hero</label>
                        <div class="flex items-center gap-4">
                            <!-- Preview Kotak Kecil (Opsional biar UI keren) -->
                            <div class="w-24 h-16 bg-slate-200 rounded-xl overflow-hidden shrink-0 border-2 border-slate-100 shadow-sm">
                                <img src="{{ asset('images/hero-bg.jpg') }}" alt="Preview BG" class="w-full h-full object-cover" onerror="this.src='https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=200&q=80'">
                            </div>
                            
                            <!-- Input File Custom -->
                            <input type="file" name="hero_image" accept="image/*" class="w-full text-sm text-[#929397] file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-slate-100 file:text-[#272831] hover:file:bg-slate-200 file:transition-colors file:cursor-pointer cursor-pointer">
                        </div>
                        <p class="text-[10px] font-medium text-slate-400 mt-2">* Kosongkan jika tidak ingin mengubah gambar. Format disarankan: JPG, PNG, WEBP (Landscape)</p>
                    </div>

                    <!-- Tombol Update -->
                    <div class="mt-4 flex justify-end border-t-2 border-slate-100 pt-6">
                        <button type="submit" class="px-8 py-4 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black rounded-full uppercase tracking-[0.2em] text-[10px] hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-lg hover:-translate-y-1 focus:outline-none">
                            Update Konten Hero
                        </button>
                    </div>
                </form>

            </div>

        </main>
    </div>

</body>
</html>