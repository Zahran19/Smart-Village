<?php

namespace App\Http\Controllers;

use App\Models\PojokWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PojokWargaController extends Controller
{
    public function addPojokWarga(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title'      => 'required|string|max:255|unique:pojok_warga,title',
            'short_desc' => 'required|string|max:500',
            'content'    => 'required|string',
            'status'     => ['required', Rule::in(['draft', 'published'])],
            'date_released' => 'nullable|date',
            'img'        => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // maks 2MB
        ]);

        // Generate slug dari title
        $slug = Str::slug($validated['title']);

        // Cek apakah slug sudah ada (tambahkan angka jika perlu)
        $count = PojokWarga::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        // Proses upload gambar
        $imagePath = 'images/pojok_warga/default.svg'; // default
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            // Simpan di folder public/images/pojok_warga dengan nama unik
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/pojok_warga'), $filename);
            $imagePath = 'images/pojok_warga/' . $filename;
        }

        // Simpan ke database
        $pojok = PojokWarga::create([
            'img'           => $imagePath,
            'title'         => $validated['title'],
            'slug'          => $slug,
            'short_desc'    => $validated['short_desc'],
            'content'       => $validated['content'],
            'status'        => $validated['status'],
            'date_released' => $validated['status'] === 'published' 
                                ? ($validated['date_released'] ?? now()) 
                                : null,
        ]);

        return response()->json([
            'message' => 'Berita berhasil ditambahkan.',
            'data'    => $pojok,
        ], 201);
    }
    public function modifyPojokWarga(Request $request)
    {
        $validated = $request->validate([
            'id'         => 'required|integer|exists:pojok_warga,id',
            'title'      => 'required|string|max:255|unique:pojok_warga,title,' . $request->input('id'),
            'short_desc' => 'required|string|max:500',
            'content'    => 'required|string',
            'status'     => ['required', Rule::in(['draft', 'published'])],
            'date_released' => 'nullable|date',
            'img'        => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // Ambil data berdasarkan ID dari validated
        $pojok = PojokWarga::findOrFail($validated['id']);

        // Update slug jika title berubah
        if ($validated['title'] !== $pojok->title) {
            $newSlug = Str::slug($validated['title']);
            $count = PojokWarga::where('slug', $newSlug)->where('id', '!=', $validated['id'])->count();
            if ($count > 0) {
                $newSlug = $newSlug . '-' . ($count + 1);
            }
            $pojok->slug = $newSlug;
        }

        // Proses upload gambar baru (jika ada)
        if ($request->hasFile('img')) {
            if ($pojok->img !== 'images/pojok_warga/default.svg' && file_exists(public_path($pojok->img))) {
                unlink(public_path($pojok->img));
            }

            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/pojok_warga'), $filename);
            $pojok->img = 'images/pojok_warga/' . $filename;
        }

        // Update field lainnya
        $pojok->title       = $validated['title'];
        $pojok->short_desc  = $validated['short_desc'];
        $pojok->content     = $validated['content'];
        $pojok->status      = $validated['status'];

        if ($validated['status'] === 'published') {
            $pojok->date_released = $validated['date_released'] ?? $pojok->date_released ?? now();
        } else {
            $pojok->date_released = null;
        }

        $pojok->save();

        return response()->json([
            'message' => 'Berita berhasil diperbarui.',
            'data'    => $pojok,
        ]);
    }
    public function removePojokWarga(Request $request)
    {
        $validated = $request->validate([
            'id'         => 'required|integer'
        ]);
        $pojok = PojokWarga::findOrFail($validated->id);

        // Hapus gambar jika bukan default
        if ($pojok->img !== 'images/pojok_warga/default.svg' && file_exists(public_path($pojok->img))) {
            unlink(public_path($pojok->img));
        }

        $pojok->delete();

        return response()->json([
            'message' => 'Berita berhasil dihapus.',
        ], 200);
    }
}