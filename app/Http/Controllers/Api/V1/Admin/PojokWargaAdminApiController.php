<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\PojokWargaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PojokWargaAdminApiController extends Controller
{
    public function __construct(
        protected PojokWargaService $pojokWargaService
    ) {}

    /**
     * Dapatkan semua berita untuk panel admin.
     */
    public function index(Request $request): JsonResponse
    {
        $filters = [
            'search' => $request->query('search'),
            'status' => $request->query('status'),
        ];

        $newsList = $this->pojokWargaService->getAdminList($filters);

        $data = $newsList->map(function ($news) {
            return [
                'id'            => $news->id,
                'title'         => $news->title,
                'slug'          => $news->slug,
                'short_desc'    => $news->short_desc,
                'content'       => $news->content,
                'img'           => $news->img,
                'img_url'       => $news->img ? asset($news->img) : asset('images/pojok_warga/default.svg'),
                'status'        => $news->status,
                'date_released' => $news->date_released ? $news->date_released->format('Y-m-d H:i:s') : null,
                'created_at'    => $news->created_at?->format('Y-m-d H:i:s'),
                'updated_at'    => $news->updated_at?->format('Y-m-d H:i:s'),
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Daftar berita admin berhasil diambil.',
            'data'    => $data,
        ]);
    }

    /**
     * Dapatkan detail berita berdasarkan ID.
     */
    public function show(int $id): JsonResponse
    {
        $news = $this->pojokWargaService->getById($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail berita berhasil diambil.',
            'data'    => [
                'id'            => $news->id,
                'title'         => $news->title,
                'slug'          => $news->slug,
                'short_desc'    => $news->short_desc,
                'content'       => $news->content,
                'img'           => $news->img,
                'img_url'       => $news->img ? asset($news->img) : asset('images/pojok_warga/default.svg'),
                'status'        => $news->status,
                'date_released' => $news->date_released ? $news->date_released->format('Y-m-d H:i:s') : null,
                'created_at'    => $news->created_at?->format('Y-m-d H:i:s'),
                'updated_at'    => $news->updated_at?->format('Y-m-d H:i:s'),
            ],
        ]);
    }

    /**
     * Tambah berita baru via API admin.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title'         => ['required', 'string', 'max:255', 'unique:pojok_wargas,title'],
            'short_desc'    => ['required', 'string', 'max:500'],
            'content'       => ['required', 'string'],
            'status'        => ['required', 'string', 'in:draft,published,Release,Draft,release,Published'],
            'date_released' => ['nullable', 'date'],
            'img'           => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
        ], [
            'title.required'      => 'Judul berita wajib diisi.',
            'title.unique'        => 'Judul berita sudah digunakan.',
            'short_desc.required' => 'Deskripsi singkat wajib diisi.',
            'content.required'    => 'Konten berita wajib diisi.',
            'img.image'           => 'File harus berupa gambar.',
            'img.max'             => 'Ukuran gambar maksimal 5MB.',
        ]);

        $image = $request->file('img');
        $berita = $this->pojokWargaService->create($validated, $image);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dibuat.',
            'data'    => [
                'id'            => $berita->id,
                'title'         => $berita->title,
                'slug'          => $berita->slug,
                'short_desc'    => $berita->short_desc,
                'content'       => $berita->content,
                'img'           => $berita->img,
                'img_url'       => $berita->img ? asset($berita->img) : asset('images/pojok_warga/default.svg'),
                'status'        => $berita->status,
                'date_released' => $berita->date_released ? $berita->date_released->format('Y-m-d H:i:s') : null,
            ],
        ], 201);
    }

    /**
     * Perbarui berita via API admin.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'title'         => ['sometimes', 'required', 'string', 'max:255', Rule::unique('pojok_wargas', 'title')->ignore($id)],
            'short_desc'    => ['sometimes', 'required', 'string', 'max:500'],
            'content'       => ['sometimes', 'required', 'string'],
            'status'        => ['sometimes', 'required', 'string', 'in:draft,published,Release,Draft,release,Published'],
            'date_released' => ['nullable', 'date'],
            'img'           => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
        ], [
            'title.unique' => 'Judul berita sudah digunakan oleh berita lain.',
            'img.image'    => 'File harus berupa gambar.',
            'img.max'      => 'Ukuran gambar maksimal 5MB.',
        ]);

        $image = $request->file('img');
        $berita = $this->pojokWargaService->update($id, $validated, $image);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil diperbarui.',
            'data'    => [
                'id'            => $berita->id,
                'title'         => $berita->title,
                'slug'          => $berita->slug,
                'short_desc'    => $berita->short_desc,
                'content'       => $berita->content,
                'img'           => $berita->img,
                'img_url'       => $berita->img ? asset($berita->img) : asset('images/pojok_warga/default.svg'),
                'status'        => $berita->status,
                'date_released' => $berita->date_released ? $berita->date_released->format('Y-m-d H:i:s') : null,
            ],
        ]);
    }

    /**
     * Hapus berita via API admin.
     */
    public function destroy(int $id): JsonResponse
    {
        $this->pojokWargaService->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dihapus.',
        ]);
    }
}
