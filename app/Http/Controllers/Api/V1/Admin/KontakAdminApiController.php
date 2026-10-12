<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KontakAdminApiController extends Controller
{
    /**
     * Dapatkan daftar data kontak desa untuk panel admin.
     */
    public function index(): JsonResponse
    {
        $contents = SiteContent::where('page', 'kontak')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data kontak desa admin berhasil diambil.',
            'data'    => $contents,
        ]);
    }

    /**
     * Perbarui data kontak desa.
     */
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'key'   => ['required', 'string', 'in:alamat,email,whatsapp,instagram,google_maps_embed'],
            'value' => ['required', 'string'],
        ], [
            'key.required' => 'Key kontak wajib diisi.',
            'key.in'       => 'Key kontak tidak valid. Pilihan: alamat, email, whatsapp, instagram, google_maps_embed.',
            'value.required' => 'Nilai kontak wajib diisi.',
        ]);

        $content = SiteContent::updateOrCreate(
            ['page' => 'kontak', 'key' => $validated['key']],
            ['value' => $validated['value'], 'type' => 'text']
        );

        return response()->json([
            'success' => true,
            'message' => "Kontak '{$validated['key']}' berhasil diperbarui.",
            'data'    => $content,
        ]);
    }
}
