<?php

namespace App\Http\Controllers;

use App\Services\PojokWargaService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PojokWargaController extends Controller
{
    public function __construct(
        protected PojokWargaService $pojokWargaService
    ) {}

    /**
     * Tambah berita baru dari form web admin.
     */
    public function addPojokWarga(Request $request)
    {
        $validated = $request->validate([
            'title'            => ['nullable', 'string', 'max:255', 'unique:pojok_wargas,title'],
            'judul'            => ['nullable', 'string', 'max:255', 'unique:pojok_wargas,title'],
            'short_desc'       => ['nullable', 'string', 'max:500'],
            'deskripsi_singkat'=> ['nullable', 'string', 'max:500'],
            'content'          => ['nullable', 'string'],
            'konten'           => ['nullable', 'string'],
            'isi'              => ['nullable', 'string'],
            'status'           => ['required', 'string'],
            'date_released'    => ['nullable', 'date'],
            'img'              => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
            'foto'             => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
        ], [
            'title.unique' => 'Judul berita sudah ada.',
            'judul.unique' => 'Judul berita sudah ada.',
            'img.image'    => 'File harus berupa gambar valid.',
            'img.mimes'    => 'Format gambar yang diperbolehkan: JPEG, PNG, JPG, WEBP, SVG.',
            'img.max'      => 'Ukuran gambar maksimal 5MB.',
        ]);

        $title = $validated['title'] ?? $validated['judul'] ?? null;
        if (empty($title)) {
            return redirect()->back()->withErrors(['title' => 'Judul berita wajib diisi.'])->withInput();
        }

        $shortDesc = $validated['short_desc'] ?? $validated['deskripsi_singkat'] ?? '';
        $content = $validated['content'] ?? $validated['konten'] ?? $validated['isi'] ?? '';
        $image = $request->file('img') ?: $request->file('foto');

        $data = [
            'title' => $title,
            'short_desc' => $shortDesc,
            'content' => $content,
            'status' => $validated['status'],
            'date_released' => $validated['date_released'] ?? null,
        ];

        $berita = $this->pojokWargaService->create($data, $image);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil ditambahkan ke Pojok Warga.',
                'data'    => $berita,
            ], 201);
        }

        return redirect()->route('admin.pojok-warga')->with('success', 'Berita berhasil ditambahkan ke Pojok Warga!');
    }

    /**
     * Update berita dari form web admin.
     */
    public function modifyPojokWarga(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'id'               => ['required', 'integer', 'exists:pojok_wargas,id'],
            'title'            => ['nullable', 'string', 'max:255', Rule::unique('pojok_wargas', 'title')->ignore($id)],
            'judul'            => ['nullable', 'string', 'max:255', Rule::unique('pojok_wargas', 'title')->ignore($id)],
            'short_desc'       => ['nullable', 'string', 'max:500'],
            'deskripsi_singkat'=> ['nullable', 'string', 'max:500'],
            'content'          => ['nullable', 'string'],
            'konten'           => ['nullable', 'string'],
            'isi'              => ['nullable', 'string'],
            'status'           => ['nullable', 'string'],
            'date_released'    => ['nullable', 'date'],
            'img'              => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
            'foto'             => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
        ], [
            'id.required'  => 'ID berita tidak valid.',
            'id.exists'    => 'Data berita tidak ditemukan.',
            'title.unique' => 'Judul berita sudah digunakan oleh berita lain.',
            'judul.unique' => 'Judul berita sudah digunakan oleh berita lain.',
            'img.image'    => 'File harus berupa gambar valid.',
            'img.mimes'    => 'Format gambar yang diperbolehkan: JPEG, PNG, JPG, WEBP, SVG.',
            'img.max'      => 'Ukuran gambar maksimal 5MB.',
        ]);

        $image = $request->file('img') ?: $request->file('foto');

        $data = [];
        if (!empty($validated['title']) || !empty($validated['judul'])) {
            $data['title'] = $validated['title'] ?? $validated['judul'];
        }
        if (isset($validated['short_desc']) || isset($validated['deskripsi_singkat'])) {
            $data['short_desc'] = $validated['short_desc'] ?? $validated['deskripsi_singkat'];
        }
        if (isset($validated['content']) || isset($validated['konten']) || isset($validated['isi'])) {
            $data['content'] = $validated['content'] ?? $validated['konten'] ?? $validated['isi'];
        }
        if (isset($validated['status'])) {
            $data['status'] = $validated['status'];
        }
        if (isset($validated['date_released'])) {
            $data['date_released'] = $validated['date_released'];
        }

        $berita = $this->pojokWargaService->update((int) $id, $data, $image);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil diperbarui.',
                'data'    => $berita,
            ]);
        }

        return redirect()->route('admin.pojok-warga')->with('success', 'Berita Pojok Warga berhasil diperbarui!');
    }

    /**
     * Hapus berita dari form web admin.
     */
    public function removePojokWarga(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer', 'exists:pojok_wargas,id'],
        ], [
            'id.required' => 'ID berita wajib disertakan.',
            'id.exists'   => 'Data berita tidak ditemukan.',
        ]);

        $this->pojokWargaService->delete((int) $validated['id']);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil dihapus.',
            ], 200);
        }

        return redirect()->route('admin.pojok-warga')->with('success', 'Berita berhasil dihapus dari Pojok Warga!');
    }
}