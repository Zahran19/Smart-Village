<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Cimulang</title>
    <link rel="icon" href="{{ asset('images/fav-icon.png') }}" type="image/png">

    
    <!-- Load Tailwind & Font Inter -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="flex justify-center items-center min-h-screen m-0 bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{ asset('images/admin_login.jpg') }}');">

    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px] z-0"></div>

    {{-- button back to beranda --}}
    <a href="/" class="absolute top-8 right-8 z-50 flex items-center gap-2 bg-white/90 backdrop-blur-md border-2 border-white/50 px-6 py-3 rounded-full shadow-2xl text-[#007540] hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] font-inter font-black text-[10px] uppercase tracking-widest transition-all duration-300 group hover:-translate-x-1 focus:outline-none">
        <svg class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Kembali ke Beranda
    </a>

    <div class="bg-white p-10 md:p-12 rounded-[3rem] shadow-2xl border-[8px] border-white/80 w-full max-w-md relative z-10 transition-all hover:border-white">
        
        <!-- Header Login -->
        <div class="text-center mb-10">
            <h3 class="text-3xl font-black text-[#007540] tracking-tighter mb-2">Login Admin</h3>
            <p class="text-sm font-medium text-[#929397]">Sistem Informasi Desa Cimulang</p>
        </div>

        <!-- Form Action ke Route Laravel -->
        <form action="/admin/login" method="POST">
            @csrf
            
            <!-- Input Username/Email -->
            <div class="mb-6">
                <label for="username_or_email" class="block text-sm font-bold text-[#272831] mb-2">Username / Email</label>
                <input type="text" id="username_or_email" name="username_or_email" required class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Masukkan username atau email">
            </div>

            <!-- Input Password -->
            <div class="mb-8">
                <label for="password" class="block text-sm font-bold text-[#272831] mb-2">Password</label>
                <input type="password" id="password" name="password" required class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Masukkan password">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full bg-[#FFDC2E] text-[#007540] hover:bg-[#007540] hover:text-[#FFDC2E] font-black text-sm uppercase tracking-widest px-6 py-4 rounded-full transition-all shadow-md hover:-translate-y-1 focus:outline-none">
                Masuk
            </button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            text: "{{ $errors->first() }}", 
            showConfirmButton: false,
            timer: 3000, 
            timerProgressBar: true, 
            background: '#ffffff',
            customClass: {
                popup: 'rounded-[2rem] border-[6px] border-slate-50 shadow-2xl',
                title: 'font-inter font-black text-[#272831]',
                htmlContainer: 'font-inter text-sm text-[#929397]'
            }
        });
    </script>
    @endif

</body>
</html>