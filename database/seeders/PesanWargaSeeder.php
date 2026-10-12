<?php

namespace Database\Seeders;

use App\Models\PesanWarga;
use Illuminate\Database\Seeder;

class PesanWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'nama' => 'Budi Santoso',
                'no_telepon' => '0812-3456-7890',
                'pesan' => 'Selamat pagi, undangan rapat desa sudah saya terima. Terima kasih informasinya.',
                'status' => 'unread',
                'created_at' => now()->subHours(2),
            ],
            [
                'nama' => 'Siti Aminah',
                'no_telepon' => '0857-1122-3344',
                'pesan' => 'Mohon info syarat pembuatan KIP baru untuk anak sekolah. Apakah harus bawa KK asli?',
                'status' => 'read',
                'created_at' => now()->subDays(1)->setTime(10, 15),
            ],
            [
                'nama' => 'Agus Setiawan',
                'no_telepon' => '0813-9876-5432',
                'pesan' => 'Lampu jalan di RT 03 RW 02 mati sejak dua hari yang lalu, mohon segera ditindaklanjuti karena jalanan sangat gelap.',
                'status' => 'unread',
                'created_at' => now()->subDays(3)->setTime(19, 45),
            ],
            [
                'nama' => 'Warga Anonim',
                'no_telepon' => '0878-5566-7788',
                'pesan' => 'Jadwal pengangkutan sampah minggu ini kok telat ya min? Mohon perhatiannya.',
                'status' => 'read',
                'created_at' => now()->subDays(5)->setTime(8, 30),
            ],
            [
                'nama' => 'Rahmat Hidayat',
                'no_telepon' => '0821-4455-6677',
                'pesan' => 'Apakah pendaftaran bantuan bibit tanaman pertanian masih dibuka untuk kelompok tani?',
                'status' => 'unread',
                'created_at' => now()->subDays(12)->setTime(14, 20),
            ],
            [
                'nama' => 'Dewi Lestari',
                'no_telepon' => '0819-0011-2233',
                'pesan' => 'Apresiasi untuk pelayanan administrasi surat pengantar yang sekarang jauh lebih cepat!',
                'status' => 'read',
                'created_at' => now()->subMonth()->setTime(11, 0),
            ],
        ];

        foreach ($messages as $msg) {
            PesanWarga::create($msg);
        }
    }
}
