<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardAnalyticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardApiController extends Controller
{
    public function __construct(
        protected DashboardAnalyticsService $analyticsService
    ) {}

    /**
     * Ambil seluruh statistik ringkasan dashboard untuk admin.
     */
    public function stats(Request $request): JsonResponse
    {
        $visitFilters = [
            'period' => $request->query('period', 'monthly'),
            'year' => $request->query('year', now()->year),
            'start_date' => $request->query('start_date'),
            'end_date' => $request->query('end_date'),
        ];

        $pesanFilters = [
            'start_date' => $request->query('pesan_start_date'),
            'end_date' => $request->query('pesan_end_date'),
        ];

        $totalBerita = $this->analyticsService->getTotalBerita();
        $visitData = $this->analyticsService->getVisitAnalytics($visitFilters);
        $pesanData = $this->analyticsService->getPesanWargaList($pesanFilters);

        return response()->json([
            'success' => true,
            'message' => 'Statistik dashboard admin berhasil diambil.',
            'data' => [
                'total_berita' => $totalBerita,
                'web_visits' => $visitData,
                'pesan_warga' => [
                    'total' => $pesanData['total'],
                    'unread_count' => $pesanData['unread_count'],
                    'filtered_count' => $pesanData['filtered_count'],
                    'latest_messages' => $pesanData['list']->take(5),
                ],
            ],
        ]);
    }

    /**
     * Ambil data analitik kunjungan web secara spesifik (chart & grouping).
     */
    public function webVisits(Request $request): JsonResponse
    {
        $filters = [
            'period' => $request->query('period', 'monthly'),
            'year' => $request->query('year', now()->year),
            'start_date' => $request->query('start_date'),
            'end_date' => $request->query('end_date'),
        ];

        $visitData = $this->analyticsService->getVisitAnalytics($filters);

        return response()->json([
            'success' => true,
            'message' => 'Data kunjungan web berhasil diambil.',
            'data' => $visitData,
        ]);
    }
}
