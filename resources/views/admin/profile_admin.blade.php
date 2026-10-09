<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Admin - Desa Cimulang</title>
    
    <!-- Load Tailwind & Font Inter -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen p-10">

    <!-- Wrapper Form Edit Profil -->
    <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border-[8px] border-white hover:border-slate-50 hover:shadow-2xl transition-all duration-500 relative z-10 w-full max-w-4xl mx-auto">
        
        <!-- Header Form -->
        <div class="mb-8 border-b-2 border-slate-100 pb-6">
            <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tight">Edit Profil Admin</h3>
            <p class="text-sm font-inter text-[#929397] mt-2">Perbarui informasi dasar dan kredensial login akun anda</p>
        </div>

        <!-- Form Action -->
        <form action="#" method="POST" id="formEditProfile">
            @csrf
            
            <!-- Grid 2 Kolom untuk Nama & Username -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Input Name -->
                <div>
                    <label for="name" class="block text-sm font-inter font-bold text-[#272831] mb-2">Nama Lengkap</label>
                    <input type="text" name="name" id="name" placeholder="Masukan nama lengkap" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>
                </div>

                <!-- Input Username -->
                <div>
                    <label for="username" class="block text-sm font-inter font-bold text-[#272831] mb-2">Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukan username" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>
                </div>
            </div>

            <!-- Input Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-inter font-bold text-[#272831] mb-2">Alamat Email</label>
                <input type="email" name="email" id="email" placeholder="Masukan email" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>
            </div>

            <!-- Input Password -->
            <div class="mb-8">
                <label for="password" class="block text-sm font-inter font-bold text-[#272831] mb-2">
                    Password Baru 
                    <span class="text-[10px] font-medium text-slate-400 ml-1 tracking-normal">(Kosongkan jika tidak ingin mengubah password)</span>
                </label>
                <input type="password" name="password" id="password" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Masukkan password baru...">
            </div>

            <!-- Tombol Action -->
            <div class="flex justify-end gap-3 pt-6 border-t-2 border-slate-100">
                <button type="button" onclick="window.history.back()" class="px-8 py-3.5 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none cursor-pointer">
                    Kembali
                </button>
                
                <button type="submit" class="px-8 py-3.5 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
            
        </form>
    </div>

</body>
</html>