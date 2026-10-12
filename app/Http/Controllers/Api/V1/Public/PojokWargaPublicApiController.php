<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Services\PojokWargaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PojokWargaPublicApiController extends Controller
{
    public function __construct(
        protected PojokWargaService $pojokWargaService
    ) {}

    /**
     * Dapatkan daftar berita yang dipublikasikan (Pojok Warga).
     */
    public function index(Request $request): JsonResponse
    {
        $limit = (int) $request->query('per_page', 10);
        $search = $request->query('search');

        $paginator = $this->pojokWargaService->getPublishedList($limit, $search);

        $items = collect($paginator->items())->map(function ($news) {
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
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Daftar berita Pojok Warga berhasil diambil.',
            'data'    => $items,
            'meta'    => [
                'current_page' => $paginator->currentPage(),
                'last_page'    => $paginator->lastPage(),
                'per_page'     => $paginator->perPage(),
                'total'        => $paginator->total(),
            ],
        ]);
    }

    /**
     * Dapatkan detail berita berdasarkan slug.
     */
    public function show(string $slug): JsonResponse
    {
        $news = $this->pojokWargaService->getBySlug($slug);

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
            ],
        ]);
    }
}
