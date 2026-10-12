<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanWarga;
use App\Services\DashboardAnalyticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PesanWargaAdminApiController extends Controller
{
    public function __construct(
        protected DashboardAnalyticsService $analyticsService
    ) {}

    /**
     * Ambil daftar pesan warga dengan filter tanggal opsional.
     */
    public function index(Request $request): JsonResponse
    {
        $filters = [
            'start_date' => $request->query('start_date'),
            'end_date' => $request->query('end_date'),
        ];

        $result = $this->analyticsService->getPesanWargaList($filters);

        return response()->json([
            'success' => true,
            'message' => 'Daftar pesan warga berhasil diambil.',
            'data' => $result['list'],
            'meta' => [
                'total' => $result['total'],
                'unread_count' => $result['unread_count'],
                'filtered_count' => $result['filtered_count'],
                'start_date' => $result['start_date'],
                'end_date' => $result['end_date'],
            ],
        ]);
    }

    /**
     * Tandai status pesan (read / unread).
     */
    public function updateStatus(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'status' => 'required|in:read,unread',
        ]);

        $pesan = PesanWarga::findOrFail($id);
        $pesan->status = $request->status;
        $pesan->save();

        return response()->json([
            'success' => true,
            'message' => 'Status pesan berhasil diperbarui.',
            'data' => $pesan,
        ]);
    }

    /**
     * Hapus pesan warga.
     */
    public function destroy(int $id): JsonResponse
    {
        $pesan = PesanWarga::findOrFail($id);
        $pesan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pesan warga berhasil dihapus.',
        ]);
    }
}
