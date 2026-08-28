<?php

namespace Database\Seeders;

use App\Models\PojokWarga;
use Illuminate\Database\Seeder;

class PojokWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PojokWarga::create([
            'img' => 'images/pojok_warga/default.svg',
            'title' => 'Draft Testing',
            'slug' => 'draft-testing',
            'short_desc' => 'Draft Short Description testing!',
            'content' => 'And this is full content of news, but this is draft version.',
            'status' => 'draft',
            'date_released' => null,
        ]);

        PojokWarga::create([
            'img' => 'images/pojok_warga/default.svg',
            'title' => 'Berita Testing Pertama',
            'slug' => 'berita-testing-pertama',
            'short_desc' => 'Ini adalah berita testing pertama untuk Pojok Warga.',
            'content' => 'Ini adalah isi lengkap dari berita testing pertama. Konten ini digunakan untuk menguji halaman detail berita.',
            'status' => 'published',
            'date_released' => now()->subDays(3),
        ]);

        PojokWarga::create([
            'img' => 'images/pojok_warga/default.svg',
            'title' => 'Berita Testing Terbaru',
            'slug' => 'berita-testing-terbaru',
            'short_desc' => 'Ini adalah berita testing terbaru.',
            'content' => 'Ini adalah isi lengkap dari berita testing terbaru yang sudah dipublikasikan.',
            'status' => 'published',
            'date_released' => now(),
        ]);
    }
}