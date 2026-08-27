<?php

namespace Database\Seeders;

use App\Models\PotensiGaleri;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PotensiGaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PotensiGaleri::create([
            'img' => 'images/potensi/default.jpg',
            'type' => 'potensi',
            'title' => 'Example',
            'short_desc' => 'Hello World!'
        ]);
        PotensiGaleri::create([
            'img' => 'images/galeri/default.jpg',
            'type' => 'galeri',
            'title' => 'Example',
            'short_desc' => ''
        ]);
    }
}
