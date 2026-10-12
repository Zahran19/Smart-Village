<?php

namespace App\Services;

use App\Models\PojokWarga;
use App\Models\PotensiGaleri;
use App\Models\SiteContent;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BerandaService
{
    /**
     * Dapatkan data konten Hero dari tabel site_contents.
     */
    public function getHeroData(): array
    {
        $contents = SiteContent::where('page', 'beranda')->get()->keyBy('key');

        $heroTitle = $contents['hero_title']->value ?? $contents['title']->value ?? 'Smart Village Desa Cimulang';
        $heroDescription = $contents['hero_description']->value ?? $contents['description']->value ?? 'Mewujudkan tata kelola pemerintahan yang transparan dan inovatif melalui transformasi digital demi kesejahteraan seluruh masyarakat Cimulang.';
        $heroImage = $contents['hero_image']->value ?? null;

        return [
            'hero_title' => $heroTitle,
            'hero_description' => $heroDescription,
            'hero_image' => $heroImage,
            'hero_image_url' => $heroImage ? asset($heroImage) : asset('images/bg.jpeg'),
        ];
    }

    /**
     * Update konten Hero di tabel site_contents dan simpan file gambar jika ada.
     */
    public function updateHero(string $title, string $description, ?UploadedFile $imageFile = null): array
    {
        // 1. Simpan gambar hero baru jika diunggah
        if ($imageFile) {
            $existingImage = SiteContent::where('page', 'beranda')
                ->where('key', 'hero_image')
                ->value('value');

            // Hapus gambar lama dari storage jika bukan default
            if ($existingImage && str_starts_with($existingImage, 'storage/')) {
                $oldStoragePath = str_replace('storage/', '', $existingImage);
                if (Storage::disk('public')->exists($oldStoragePath)) {
                    Storage::disk('public')->delete($oldStoragePath);
                }
            }

            $storedPath = $imageFile->store('hero', 'public');
            $imageValue = 'storage/' . $storedPath;

            SiteContent::updateOrCreate(
                ['page' => 'beranda', 'key' => 'hero_image'],
                ['value' => $imageValue, 'type' => 'image']
            );
        }

        // 2. Simpan title & hero_title
        SiteContent::updateOrCreate(
            ['page' => 'beranda', 'key' => 'hero_title'],
            ['value' => $title, 'type' => 'text']
        );
        SiteContent::updateOrCreate(
            ['page' => 'beranda', 'key' => 'title'],
            ['value' => $title, 'type' => 'text']
        );

        // 3. Simpan description & hero_description
        SiteContent::updateOrCreate(
            ['page' => 'beranda', 'key' => 'hero_description'],
            ['value' => $description, 'type' => 'text']
        );
        SiteContent::updateOrCreate(
            ['page' => 'beranda', 'key' => 'description'],
            ['value' => $description, 'type' => 'text']
        );

        return $this->getHeroData();
    }

    /**
     * Dapatkan kumpulan data lengkap untuk Beranda publik (Guest).
     */
    public function getBerandaPublicData(): array
    {
        $hero = $this->getHeroData();

        $latestNews = PojokWarga::where('status', 'published')
            ->orderBy('date_released', 'desc')
            ->take(3)
            ->get()
            ->map(function ($news) {
                return [
                    'id' => $news->id,
                    'title' => $news->title,
                    'slug' => $news->slug,
                    'short_desc' => $news->short_desc,
                    'img_url' => $news->img ? asset($news->img) : asset('images/pojok_warga/default.svg'),
                    'date_released' => $news->date_released ? $news->date_released->format('Y-m-d') : null,
                ];
            });

        $gallery = PotensiGaleri::orderBy('created_at', 'desc')
            ->take(4)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => $item->type,
                    'img_url' => $item->img ? asset($item->img) : asset('images/galeri/default.jpg'),
                ];
            });

        $kontakContents = SiteContent::where('page', 'kontak')->get()->keyBy('key');

        return [
            'hero' => $hero,
            'latest_news' => $latestNews,
            'gallery' => $gallery,
            'contact' => [
                'alamat' => $kontakContents['alamat']->value ?? null,
                'email' => $kontakContents['email']->value ?? null,
                'whatsapp' => $kontakContents['whatsapp']->value ?? null,
                'instagram' => $kontakContents['instagram']->value ?? null,
            ],
        ];
    }
}
