<?php

namespace App\Services;

use App\Models\PojokWarga;
use App\Models\WebVisit;
use App\Models\PesanWarga;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DashboardAnalyticsService
{
    /**
     * Hitung total berita (Pojok Warga).
     */
    public function getTotalBerita(): int
    {
        return PojokWarga::count();
    }

    /**
     * Parsing tanggal fleksibel dari Flatpickr atau input string.
     */
    protected function parseDateRange(array $filters): array
    {
        $startDate = $filters['start_date'] ?? null;
        $endDate = $filters['end_date'] ?? null;

        // Jika dikirim sebagai date_range tunggal "2026-10-01 to 2026-10-12"
        if (!empty($filters['date_range'])) {
            $parts = explode(' to ', $filters['date_range']);
            $startDate = trim($parts[0] ?? '');
            $endDate = trim($parts[1] ?? $parts[0] ?? '');
        }

        return [$startDate, $endDate];
    }

    /**
     * Ambil data statistik kunjungan web untuk chart & overview.
     */
    public function getVisitAnalytics(array $filters = []): array
    {
        $period = $filters['period'] ?? 'yearly';
        $currentYear = (int) ($filters['year'] ?? now()->year);
        $totalVisitsAllTime = WebVisit::count();

        [$startDateStr, $endDateStr] = $this->parseDateRange($filters);

        $labels = [];
        $values = [];
        $filterDescription = '';

        if ($period === 'yearly') {
            $minDbYear = WebVisit::selectRaw("MIN(strftime('%Y', visited_at)) as min_yr")->value('min_yr');
            $startYear = $minDbYear ? min((int) $minDbYear, $currentYear - 4) : ($currentYear - 4);
            $filterDescription = "Statistik Tahunan ($startYear - $currentYear)";

            $yearlyCounts = WebVisit::selectRaw("strftime('%Y', visited_at) as yr, COUNT(*) as total")
                ->whereRaw("strftime('%Y', visited_at) >= ?", [(string) $startYear])
                ->whereRaw("strftime('%Y', visited_at) <= ?", [(string) $currentYear])
                ->groupBy('yr')
                ->pluck('total', 'yr')
                ->toArray();

            for ($yr = $startYear; $yr <= $currentYear; $yr++) {
                $labels[] = (string) $yr;
                $values[] = (int) ($yearlyCounts[(string) $yr] ?? 0);
            }
        } elseif ($period === 'custom' && !empty($startDateStr) && !empty($endDateStr)) {
            $startDate = Carbon::parse($startDateStr)->startOfDay();
            $endDate = Carbon::parse($endDateStr)->endOfDay();

            if ($startDate->gt($endDate)) {
                [$startDate, $endDate] = [$endDate, $startDate];
            }

            if ($startDate->diffInDays($endDate) > 90) {
                $startDate = (clone $endDate)->subDays(90)->startOfDay();
            }

            $filterDescription = $startDate->isoFormat('D MMM Y') . ' — ' . $endDate->isoFormat('D MMM Y');

            $dailyCounts = WebVisit::selectRaw("strftime('%Y-%m-%d', visited_at) as dt, COUNT(*) as total")
                ->whereBetween('visited_at', [$startDate, $endDate])
                ->groupBy('dt')
                ->pluck('total', 'dt')
                ->toArray();

            $datePeriod = CarbonPeriod::create($startDate, $endDate);
            foreach ($datePeriod as $date) {
                $dtKey = $date->format('Y-m-d');
                $labels[] = $date->isoFormat('D MMM');
                $values[] = (int) ($dailyCounts[$dtKey] ?? 0);
            }
        } else {
            $period = 'monthly';
            $filterDescription = "Periode Tahun $currentYear (Januari - Desember)";
            $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

            $monthlyCounts = WebVisit::selectRaw("CAST(strftime('%m', visited_at) AS INTEGER) as mth, COUNT(*) as total")
                ->whereRaw("strftime('%Y', visited_at) = ?", [(string) $currentYear])
                ->groupBy('mth')
                ->pluck('total', 'mth')
                ->toArray();

            for ($m = 1; $m <= 12; $m++) {
                $labels[] = $monthNames[$m - 1];
                // Jika tahun berjalan dan bulan lebih besar dari bulan saat ini, beri null agar kurva tidak jatuh tajam ke 0
                if ($currentYear === (int) now()->year && $m > (int) now()->month) {
                    $values[] = null;
                } else {
                    $values[] = (int) ($monthlyCounts[$m] ?? 0);
                }
            }
        }

        $filteredValues = array_filter($values, fn($v) => !is_null($v));
        $periodTotal = array_sum($filteredValues);

        $visitsThisMonth = WebVisit::whereYear('visited_at', now()->year)
            ->whereMonth('visited_at', now()->month)
            ->count();

        $visitsThisYear = WebVisit::whereYear('visited_at', now()->year)
            ->count();

        $availableYears = WebVisit::selectRaw("DISTINCT strftime('%Y', visited_at) as yr")
            ->orderBy('yr', 'desc')
            ->pluck('yr')
            ->filter()
            ->map(fn($y) => (int)$y)
            ->values()
            ->toArray();

        if (empty($availableYears)) {
            $availableYears = [(int) now()->year];
        }

        return [
            'period' => $period,
            'selected_year' => $currentYear,
            'filter_description' => $filterDescription,
            'labels' => $labels,
            'values' => $values,
            'period_total' => $periodTotal,
            'total_all_time' => $totalVisitsAllTime,
            'visits_this_month' => $visitsThisMonth,
            'visits_this_year' => $visitsThisYear,
            'available_years' => $availableYears,
            'start_date' => $startDateStr,
            'end_date' => $endDateStr,
            'date_range' => ($startDateStr && $endDateStr) ? "$startDateStr to $endDateStr" : '',
        ];
    }

    /**
     * Ambil pesan warga HARI INI saja (maksimal $limit item untuk panel dashboard).
     */
    public function getPesanWargaToday(int $limit = 3)
    {
        return PesanWarga::whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }

    /**
     * Ambil data seluruh pesan warga dengan filter tanggal opsional (untuk modal Semua Pesan Warga).
     * Jika dibuka pertama kali tanpa filter, otomatis prefill tanggal paling awal dan paling akhir.
     */
    public function getPesanWargaList(array $filters = []): array
    {
        [$startDateStr, $endDateStr] = $this->parseDateRange($filters);

        $earliestPesan = PesanWarga::min('created_at');
        $latestPesan = PesanWarga::max('created_at');

        $defaultStartDate = $earliestPesan 
            ? Carbon::parse($earliestPesan)->format('Y-m-d') 
            : now()->startOfMonth()->format('Y-m-d');

        $defaultEndDate = $latestPesan 
            ? Carbon::parse($latestPesan)->format('Y-m-d') 
            : now()->format('Y-m-d');

        $isCustomFilter = !empty($startDateStr) || !empty($endDateStr);

        // Jika tidak ada filter yang dikirimkan, gunakan tanggal paling awal dan paling akhir dari database
        if (empty($startDateStr)) {
            $startDateStr = $defaultStartDate;
        }
        if (empty($endDateStr)) {
            $endDateStr = $defaultEndDate;
        }

        $query = PesanWarga::query();

        $start = Carbon::parse($startDateStr)->startOfDay();
        $end = Carbon::parse($endDateStr)->endOfDay();
        if ($start->gt($end)) {
            [$start, $end] = [$end, $start];
        }
        $query->whereBetween('created_at', [$start, $end]);

        $pesanList = $query->orderBy('created_at', 'desc')->get();
        $totalPesan = PesanWarga::count();
        $todayPesanCount = PesanWarga::whereDate('created_at', Carbon::today())->count();
        $unreadCount = PesanWarga::where('status', 'unread')->count();

        return [
            'list' => $pesanList,
            'total' => $totalPesan,
            'today_count' => $todayPesanCount,
            'unread_count' => $unreadCount,
            'filtered_count' => $pesanList->count(),
            'start_date' => $startDateStr,
            'end_date' => $endDateStr,
            'is_custom_filter' => $isCustomFilter,
            'default_start_date' => $defaultStartDate,
            'default_end_date' => $defaultEndDate,
            'date_range' => ($startDateStr && $endDateStr) ? "$startDateStr to $endDateStr" : '',
        ];
    }
}
