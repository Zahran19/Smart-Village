<?php

namespace Database\Seeders;

use App\Models\SiteContent;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteContent::create([
            'page' => 'beranda',
            'key' => 'hero_title',
            'value' => 'Desa Cimulang',
            'type' => 'text'
        ]);

        SiteContent::create([
            'page' => 'visi_misi',
            'key' => 'visi',
            'value' => '"Terwujudnya Desa Cimulang yang Maju, Mandiri, dan Sejahtera Berbasis Teknologi Informasi serta Kearifan Lokal pada Tahun 2030."',
            'type' => 'text'
        ]);
        SiteContent::create([
            'page' => 'visi_misi',
            'key' => 'misi',
            'value' => '["Meningkatkan kualitas pelayanan publik melalui digitalisasi administrasi desa.", "Mengembangkan potensi ekonomi lokal melalui pemberdayaan UMKM berbasis digital.", "Mewujudkan infrastruktur desa yang merata dan berwawasan lingkungan.", "Melestarikan nilai-nilai budaya dan gotong royong dalam kehidupan bermasyarakat."]',
            'type' => 'array'
        ]);
    }
}
