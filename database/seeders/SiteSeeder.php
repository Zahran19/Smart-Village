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
        // ini buat beranda
        SiteContent::create([
            'page' => 'beranda',
            'key' => 'hero_title',
            'value' => 'Desa Cimulang',
            'type' => 'text'
        ]);

        // ini buat visi misi
        SiteContent::create([
            'page' => 'visi_misi',
            'key' => 'visi',
            'value' => '"Terwujudnya Desa Cimulang yang Maju, Mandiri, dan Sejahtera Berbasis Teknologi Informasi serta Kearifan Lokal pada Tahun 2030."',
            'type' => 'text'
        ]);
        SiteContent::create([
            'page' => 'visi_misi',
            'key' => 'misi',
            'value' => '1. abcd\n2.efgh',
            'type' => 'array'
        ]);
        
        // ini buat kontak
        SiteContent::create([
            'page' => 'kontak',
            'key' => 'alamat',
            'value' => 'Jl. Raya Cimulang No. 45 Kec. Rancabungur, Bogor',
            'type' => 'text'
        ]);
        SiteContent::create([
            'page' => 'kontak',
            'key' => 'email',
            'value' => 'admin@cimulang.desa.id',
            'type' => 'text'
        ]);
        SiteContent::create([
            'page' => 'kontak',
            'key' => 'whatsapp',
            'value' => '+62 812-3456-7890',
            'type' => 'text'
        ]);
        SiteContent::create([
            'page' => 'kontak',
            'key' => 'instagram',
            'value' => '@desa_cimulang',
            'type' => 'text'
        ]);
        SiteContent::create([
            'page' => 'kontak',
            'key' => 'google_maps_embed',
            'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.952912260219!2d106.7713977!3d-6.577266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4a4e0a6e021%3A0x1d06e0c07c0e8b0!2sDesa%20Cimulang!5e0!3m2!1sid!2sid!4v1625123456789!5m2!1sid!2sid',
            'type' => 'text'
        ]);
    }
}
