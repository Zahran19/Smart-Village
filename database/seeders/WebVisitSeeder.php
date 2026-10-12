<?php

namespace Database\Seeders;

use App\Models\WebVisit;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WebVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $urls = ['/', '/sejarah', '/visi-misi', '/pemerintah-desa', '/pojok-warga', '/potensi-galeri', '/kontak'];
        $visits = [];

        // Data kunjungan beberapa tahun lalu (2024, 2025)
        for ($year = 2024; $year <= 2025; $year++) {
            for ($month = 1; $month <= 12; $month++) {
                $count = rand(20, 80);
                for ($i = 0; $i < $count; $i++) {
                    $day = rand(1, 28);
                    $date = Carbon::create($year, $month, $day, rand(8, 22), rand(0, 59));
                    $visits[] = [
                        'ip_address' => '192.168.1.' . rand(2, 250),
                        'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                        'url' => $urls[array_rand($urls)],
                        'visited_at' => $date,
                        'created_at' => $date,
                        'updated_at' => $date,
                    ];
                }
            }
        }

        // Data kunjungan tahun berjalan (2026) sampai bulan ini (Oktober)
        for ($month = 1; $month <= 10; $month++) {
            $daysInMonth = ($month == 10) ? 12 : 28;
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $count = rand(3, 15);
                for ($i = 0; $i < $count; $i++) {
                    $date = Carbon::create(2026, $month, $day, rand(6, 23), rand(0, 59));
                    $visits[] = [
                        'ip_address' => '10.0.0.' . rand(2, 250),
                        'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64)',
                        'url' => $urls[array_rand($urls)],
                        'visited_at' => $date,
                        'created_at' => $date,
                        'updated_at' => $date,
                    ];
                }
            }
        }

        // Chunk insert
        foreach (array_chunk($visits, 500) as $chunk) {
            WebVisit::insert($chunk);
        }
    }
}
