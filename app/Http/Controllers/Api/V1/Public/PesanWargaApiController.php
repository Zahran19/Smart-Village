<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Models\PesanWarga;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PesanWargaApiController extends Controller
{
    /**
     * Kirim aspirasi atau pesan dari warga (Public API).
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'no_telepon' => 'required|string|max:25',
            'pesan' => 'required|string|max:2000',
        ]);

        $pesan = PesanWarga::create([
            'nama' => $validated['nama'],
            'no_telepon' => $validated['no_telepon'],
            'pesan' => $validated['pesan'],
            'status' => 'unread',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda berhasil terkirim kepada pihak pengelola desa.',
            'data' => $pesan,
        ], 201);
    }
}
