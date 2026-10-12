<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Services\BerandaService;
use Illuminate\Http\JsonResponse;

class BerandaApiController extends Controller
{
    public function __construct(
        protected BerandaService $berandaService
    ) {}

    /**
     * Dapatkan semua konten Beranda untuk Guest/Public.
     */
    public function index(): JsonResponse
    {
        $data = $this->berandaService->getBerandaPublicData();

        return response()->json([
            'success' => true,
            'message' => 'Data beranda publik berhasil diambil.',
            'data' => $data,
        ]);
    }
}
