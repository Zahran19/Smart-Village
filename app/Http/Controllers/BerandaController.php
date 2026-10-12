<?php

namespace App\Http\Controllers;

use App\Services\BerandaService;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function __construct(
        protected BerandaService $berandaService
    ) {}

    /**
     * Memperbarui konten hero beranda dari form admin.
     */
    public function updateHero(Request $request)
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

        $this->berandaService->updateHero(
            $validated['hero_title'],
            $validated['hero_description'],
            $imageFile
        );

        return redirect()->back()
            ->with('success', 'Konten hero beranda berhasil diperbarui!');
    }
}
