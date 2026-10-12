<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\BerandaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BerandaAdminApiController extends Controller
{
    public function __construct(
        protected BerandaService $berandaService
    ) {}

    /**
     * Dapatkan pengaturan hero beranda saat ini.
     */
    public function getHero(): JsonResponse
    {
        $hero = $this->berandaService->getHeroData();

        return response()->json([
            'success' => true,
            'message' => 'Pengaturan hero beranda berhasil diambil.',
            'data' => $hero,
        ]);
    }

    /**
     * Perbarui pengaturan hero beranda via API.
     */
    public function updateHero(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['required', 'string', 'max:2000'],
            'hero_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ], [
            'hero_title.required' => 'Judul utama hero wajib diisi.',
            'hero_title.max' => 'Judul utama hero maksimal 255 karakter.',
            'hero_description.required' => 'Deskripsi singkat hero wajib diisi.',
            'hero_description.max' => 'Deskripsi singkat hero maksimal 2000 karakter.',
            'hero_image.image' => 'File background harus berupa gambar.',
            'hero_image.mimes' => 'Format gambar yang diperbolehkan: JPEG, PNG, JPG, WEBP.',
            'hero_image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        $imageFile = $request->hasFile('hero_image') ? $request->file('hero_image') : null;

        $hero = $this->berandaService->updateHero(
            $validated['hero_title'],
            $validated['hero_description'],
            $imageFile
        );

        return response()->json([
            'success' => true,
            'message' => 'Konten hero beranda berhasil diperbarui.',
            'data' => $hero,
        ]);
    }
}
