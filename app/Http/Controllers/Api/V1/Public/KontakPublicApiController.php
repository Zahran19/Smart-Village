<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\JsonResponse;

class KontakPublicApiController extends Controller
{
    /**
     * Dapatkan informasi kontak resmi desa Cimulang.
     */
    public function index(): JsonResponse
    {
        $contents = SiteContent::where('page', 'kontak')->get()->keyBy('key');

        $data = [
            'alamat'             => $contents['alamat']->value ?? null,
            'email'              => $contents['email']->value ?? null,
            'whatsapp'           => $contents['whatsapp']->value ?? null,
            'instagram'          => $contents['instagram']->value ?? null,
            'google_maps_embed'  => $contents['google_maps_embed']->value ?? null,
        ];

        return response()->json([
            'success' => true,
            'message' => 'Data kontak desa berhasil diambil.',
            'data'    => $data,
        ]);
    }
}
