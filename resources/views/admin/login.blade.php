<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Cimulang</title>
    
    <!-- Load Tailwind & Font Inter -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<!-- Body pake background gambar sawah/pedesaan -->
<body class="flex justify-center items-center min-h-screen m-0 bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{ asset('images/admin_login.jpg') }}');">

    <!-- Overlay Gelap + Blur biar backgroundnya elegan dan card tetep kebaca -->
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px] z-0"></div>

    <!-- Card Login (z-10 biar ada di atas overlay) -->
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

</body>
</html>