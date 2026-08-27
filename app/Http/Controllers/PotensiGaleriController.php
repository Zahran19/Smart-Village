<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PotensiGaleri;

class PotensiGaleriController extends Controller
{
    private function defaultImage(string $type): string
    {
        return "images/{$type}/default.jpg";
    }

    private function deleteImage(?string $path, string $type): void
    {
        if (!$path || $path === $this->defaultImage($type)) {
            return;
        }

        $storagePath = str_replace('storage/', '', $path);

        Storage::disk('public')->delete($storagePath);
    }

    private function storeImage($file, string $type, ?string $oldImage = null): string
    {
        if ($oldImage) {
            $this->deleteImage($oldImage, $type);
        }

        $path = $file->store($type, 'public');

        // Simpan sebagai storage/potensi/xxx.jpg
        // atau storage/galeri/xxx.jpg
        return 'storage/' . $path;
    }


    /*
    |--------------------------------------------------------------------------
    | POTENSI
    |--------------------------------------------------------------------------
    */

    public function addPotensi(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
        ]);
        $validated['type'] = 'potensi';
        

        if ($request->hasFile('img')) {
            $validated['img'] = $this->storeImage(
                $request->file('img'),
                'potensi'
            );
        } else {
            $validated['img'] = $this->defaultImage('potensi');
        }
        PotensiGaleri::create($validated);

        return back()->with(
            'success',
            'Potensi berhasil ditambahkan.'
        );
    }

    public function modifyPotensi(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:potensi_galeris,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
        ]);

        $potensi = PotensiGaleri::where('id', $validated['id'])
            ->where('type', 'potensi')
            ->firstOrFail();

        $potensi->title = $validated['title'];
        $potensi->short_desc = $validated['short_desc'];

        if ($request->hasFile('img')) {
            $potensi->img = $this->storeImage(
                $request->file('img'),
                'potensi',
                $potensi->img
            );
        }

        $potensi->save();

        return back()->with(
            'success',
            'Potensi berhasil diperbarui.'
        );
    }

    public function removePotensi(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:potensi_galeris,id',
        ]);

        $potensi = PotensiGaleri::where('id', $validated['id'])
            ->where('type', 'potensi')
            ->firstOrFail();

        $this->deleteImage($potensi->img, 'potensi');

        $potensi->delete();

        return back()->with(
            'success',
            'Potensi berhasil dihapus.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | GALERI
    |--------------------------------------------------------------------------
    */

    public function addGaleri(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string|max:255',
        ]);

        $validated['type'] = 'galeri';
        $validated['short_desc'] = '';

        if ($request->hasFile('img')) {
            $validated['img'] = $this->storeImage(
                $request->file('img'),
                'galeri'
            );
        } else {
            $validated['img'] = $this->defaultImage('galeri');
        }

        PotensiGaleri::create($validated);

        return back()->with(
            'success',
            'Galeri berhasil ditambahkan.'
        );
    }

    public function modifyGaleri(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:potensi_galeris,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string|max:255',
        ]);

        $galeri = PotensiGaleri::where('id', $validated['id'])
            ->where('type', 'galeri')
            ->firstOrFail();

        $galeri->title = $validated['title'];
        $galeri->short_desc = '';

        if ($request->hasFile('img')) {
            $galeri->img = $this->storeImage(
                $request->file('img'),
                'galeri',
                $galeri->img
            );
        }

        $galeri->save();

        return back()->with(
            'success',
            'Galeri berhasil diperbarui.'
        );
    }

    public function removeGaleri(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:potensi_galeris,id',
        ]);

        $galeri = PotensiGaleri::where('id', $validated['id'])
            ->where('type', 'galeri')
            ->firstOrFail();

        $this->deleteImage($galeri->img, 'galeri');

        $galeri->delete();

        return back()->with(
            'success',
            'Galeri berhasil dihapus.'
        );
    }
}