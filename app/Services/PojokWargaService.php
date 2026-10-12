<?php

namespace App\Services;

use App\Models\PojokWarga;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PojokWargaService
{
    /**
     * Dapatkan daftar berita untuk admin (semua status atau filter).
     */
    public function getAdminList(array $filters = [])
    {
        $query = PojokWarga::query();

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_desc', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if (!empty($filters['status']) && in_array($filters['status'], ['draft', 'published'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderBy('created_at', 'desc')->get();
    }

    /**
     * Dapatkan daftar berita publik (hanya published).
     */
    public function getPublishedList(int $limit = 10, ?string $search = null)
    {
        $query = PojokWarga::where('status', 'published');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_desc', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        return $query->orderBy('date_released', 'desc')->paginate($limit);
    }

    /**
     * Cari berita berdasarkan slug untuk halaman publik.
     */
    public function getBySlug(string $slug): PojokWarga
    {
        return PojokWarga::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
    }

    /**
     * Cari berita berdasarkan id.
     */
    public function getById(int $id): PojokWarga
    {
        return PojokWarga::findOrFail($id);
    }

    /**
     * Buat berita baru di Pojok Warga.
     */
    public function create(array $data, ?UploadedFile $image = null): PojokWarga
    {
        $title = $data['title'] ?? $data['judul'] ?? '';
        $shortDesc = $data['short_desc'] ?? $data['deskripsi_singkat'] ?? '';
        $content = $data['content'] ?? $data['konten'] ?? $data['isi'] ?? '';
        $rawStatus = strtolower($data['status'] ?? 'draft');
        $status = in_array($rawStatus, ['published', 'release']) ? 'published' : 'draft';

        // Buat slug unik
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $count = PojokWarga::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $baseSlug . '-' . ($count + 1);
        }

        // Upload gambar jika ada
        $imagePath = 'images/pojok_warga/default.svg';
        if ($image) {
            $storedPath = $image->store('pojok_warga', 'public');
            $imagePath = 'storage/' . $storedPath;
        }

        $dateReleased = null;
        if ($status === 'published') {
            $dateReleased = !empty($data['date_released']) ? $data['date_released'] : now();
        }

        return PojokWarga::create([
            'img'           => $imagePath,
            'title'         => $title,
            'slug'          => $slug,
            'short_desc'    => $shortDesc,
            'content'       => $content,
            'status'        => $status,
            'date_released' => $dateReleased,
        ]);
    }

    /**
     * Perbarui data berita di Pojok Warga.
     */
    public function update(int $id, array $data, ?UploadedFile $image = null): PojokWarga
    {
        $pojok = PojokWarga::findOrFail($id);

        $title = $data['title'] ?? $data['judul'] ?? $pojok->title;
        $shortDesc = $data['short_desc'] ?? $data['deskripsi_singkat'] ?? $pojok->short_desc;
        $content = $data['content'] ?? $data['konten'] ?? $data['isi'] ?? $pojok->content;
        
        if (isset($data['status'])) {
            $rawStatus = strtolower($data['status']);
            $status = in_array($rawStatus, ['published', 'release']) ? 'published' : 'draft';
        } else {
            $status = $pojok->status;
        }

        // Update slug jika judul berubah
        if ($title !== $pojok->title) {
            $baseSlug = Str::slug($title);
            $slug = $baseSlug;
            $count = PojokWarga::where('slug', $slug)->where('id', '!=', $id)->count();
            if ($count > 0) {
                $slug = $baseSlug . '-' . ($count + 1);
            }
            $pojok->slug = $slug;
        }

        // Upload gambar baru dan hapus gambar lama jika ada
        if ($image) {
            $this->deleteImageFile($pojok->img);
            $storedPath = $image->store('pojok_warga', 'public');
            $pojok->img = 'storage/' . $storedPath;
        }

        $pojok->title = $title;
        $pojok->short_desc = $shortDesc;
        $pojok->content = $content;
        $pojok->status = $status;

        if ($status === 'published') {
            $pojok->date_released = !empty($data['date_released']) ? $data['date_released'] : ($pojok->date_released ?? now());
        } else {
            $pojok->date_released = null;
        }

        $pojok->save();

        return $pojok;
    }

    /**
     * Hapus berita dari Pojok Warga beserta file gambarnya.
     */
    public function delete(int $id): bool
    {
        $pojok = PojokWarga::findOrFail($id);
        $this->deleteImageFile($pojok->img);
        return $pojok->delete();
    }

    /**
     * Hapus file gambar dari disk jika bukan gambar default.
     */
    protected function deleteImageFile(?string $imagePath): void
    {
        if (!$imagePath || $imagePath === 'images/pojok_warga/default.svg') {
            return;
        }

        if (str_starts_with($imagePath, 'storage/')) {
            $storagePath = str_replace('storage/', '', $imagePath);
            if (Storage::disk('public')->exists($storagePath)) {
                Storage::disk('public')->delete($storagePath);
            }
        } elseif (file_exists(public_path($imagePath))) {
            @unlink(public_path($imagePath));
        }
    }
}
