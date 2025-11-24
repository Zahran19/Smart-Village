<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Website Desa</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="font-sans antialiased text-gray-900">

        <nav class="bg-indigo-50 shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a href="#" class="font-bold text-xl">
                    Logo (Nama Desa)
                </a>
                <ul class="flex space-x-6 items-center">
                    <li><a href="#beranda" class="hover:text-indigo-600">Beranda</a></li>
                    
                    <li class="relative group">
                        <a href="#profil" class="hover:text-indigo-600 flex items-center">
                            Profil Desa
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </a>
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Visi & Misi</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Sejarah Desa</a>
                        </div>
                    </li>
                    
                    <li><a href="#pojok-warga" class="hover:text-indigo-600">Pojok Warga</a></li>

                    <li class="relative group">
                        <a href="#galeri" class="hover:text-indigo-600 flex items-center">
                            Potensi & Galeri
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </a>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Potensi Alam</a>
                            <a href="#galeri" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Galeri Foto</a>
                        </div>
                    </li>

                    <li><a href="#kontak" class="hover:text-indigo-600">Kontak</a></li>
                </ul>
            </div>
        </nav>

        <section id="beranda" class="bg-green-200 py-32" style="background-image: url('URL_FOTO_DESA_ANDA'); background-size: cover; background-position: center;">
            <div class="container mx-auto text-center">
                <div class="bg-yellow-200 inline-block p-12 rounded-lg shadow-xl border-4 border-purple-400 max-w-2xl">
                    <h1 class="text-4xl font-bold">Heading 1</h1>
                    <p class="mt-4 text-lg">A little bit of text. Ini adalah deskripsi singkat tentang desa Anda.</p>
                    <a href="#tentang" class="mt-8 inline-block bg-pink-300 text-black px-8 py-3 rounded-lg shadow-md font-semibold hover:bg-pink-400 transition-colors">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </section>

        <section id="tentang" class="bg-green-200 py-24">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-bold text-center mb-16">Tentang</h2>
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="md:w-1/2">
                        <h3 class="text-3xl font-semibold">Heading 1</h3>
                        <p class="mt-4 text-gray-700">
                            A little bit of text. Di sini Anda bisa menulis deskripsi tentang sejarah desa, 
                            visi misi, atau sambutan kepala desa.
                        </p>
                    </div>
                    <div class="md:w-1/2 bg-yellow-200 h-80 rounded-lg shadow-md flex items-center justify-center text-gray-500 text-2xl font-semibold">
                        Gambar
                    </div>
                </div>
            </div>
        </section>

        <section id="pojok-warga" class="bg-green-200 py-24">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold">Pojok Warga</h2>
                <p class="text-lg mt-2 mb-16 text-gray-700">A little bit of text. Berisi artikel atau berita terbaru.</p>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-yellow-200 p-8 rounded-lg shadow-md text-center flex flex-col justify-between">
                        <div>
                            <h4 class="text-2xl font-semibold">Title Artikel</h4>
                            <p class="mt-2">A little bit of text describing the article...</p>
                        </div>
                        <a href="#" class="mt-6 inline-block bg-pink-300 text-black px-6 py-2 rounded-lg shadow font-semibold hover:bg-pink-400 transition-colors">
                            Button
                        </a>
                    </div>
                    <div class="bg-yellow-200 p-8 rounded-lg shadow-md text-center flex flex-col justify-between">
                        <div>
                            <h4 class="text-2xl font-semibold">Title Artikel</h4>
                            <p class="mt-2">A little bit of text describing the article...</p>
                        </div>
                        <a href="#" class="mt-6 inline-block bg-pink-300 text-black px-6 py-2 rounded-lg shadow font-semibold hover:bg-pink-400 transition-colors">
                            Button
                        </a>
                    </div>
                    <div class="bg-yellow-200 p-8 rounded-lg shadow-md text-center flex flex-col justify-between">
                        <div>
                            <h4 class="text-2xl font-semibold">Title Artikel</h4>
                            <p class="mt-2">A little bit of text describing the article...</p>
                        </div>
                        <a href="#" class="mt-6 inline-block bg-pink-300 text-black px-6 py-2 rounded-lg shadow font-semibold hover:bg-pink-400 transition-colors">
                            Button
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="galeri" class="bg-green-200 py-24">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold">Galeri Foto</h2>
                <p class="text-lg mt-2 mb-16 text-gray-700">A little bit of text</p>

                <div class="flex flex-wrap justify-center gap-6">
                    <div class="bg-yellow-200 w-full md:w-1/4 h-56 rounded-lg shadow-md flex items-center justify-center text-gray-500">Foto</div>
                    <div class="bg-yellow-200 w-full md:w-1/4 h-56 rounded-lg shadow-md flex items-center justify-center text-gray-500">Foto</div>
                    <div class="bg-yellow-200 w-full md:w-1/4 h-56 rounded-lg shadow-md flex items-center justify-center text-gray-500">Foto</div>
                    <div class="bg-yellow-200 w-full md:w-1/4 h-56 rounded-lg shadow-md flex items-center justify-center text-gray-500">Foto</div>
                    <div class="bg-yellow-200 w-full md:w-1/4 h-56 rounded-lg shadow-md flex items-center justify-center text-gray-500">Foto</div>
                </div>
            </div>
        </section>

        <section id="kontak">
            <div class="bg-green-300 py-20">
                <div class="container mx-auto px-6 text-center">
                    <h2 class="text-4xl font-bold mb-16">Contact</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div>
                            <h4 class="text-2xl font-semibold">Alamat</h4>
                            <p class="mt-2">Jl. Desa Suka Maju No. 1, Kec. Damai, Kab. Sejahtera</p>
                        </div>
                        <div>
                            <h4 class="text-2xl font-semibold">Email</h4>
                            <p class="mt-2">info@desasukamaju.id</p>
                        </div>
                        <div>
                            <h4 class="text-2xl font-semibold">WhatsApp</h4>
                            <p class="mt-2">0812-3456-7890</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-yellow-200 py-32 text-center text-gray-500 text-2xl font-semibold">
                Maps Placeholder
            </div>
        </section>

        <footer class="bg-gray-800 text-white text-center py-6">
            <p>&copy; {{ date('Y') }} Nama Desa. All Rights Reserved.</p>
        </footer>

    </body>
</html>