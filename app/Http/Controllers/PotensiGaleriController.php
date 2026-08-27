<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PotensiGaleri;

class PotensiGaleriController extends Controller
{
    public function addPotensi(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
        ]);

        $validated['type'] = 'potensi';
        $validated['img'] = $request->file('img')->store('potensi', 'public');

        PotensiGaleri::create($validated);

        return back()->with('success', 'Potensi berhasil ditambahkan.');
    }

    public function modifyPotensi(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:potensi_galeri,id',
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
            if ($potensi->img) {
                Storage::disk('public')->delete($potensi->img);
            }

            $potensi->img = $request->file('img')->store('potensi', 'public');
        }

        $potensi->save();

        return back()->with('success', 'Potensi berhasil diperbarui.');
    }

    public function removePotensi(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:potensi_galeri,id',
        ]);

        $potensi = PotensiGaleri::where('id', $validated['id'])
            ->where('type', 'potensi')
            ->firstOrFail();

        if ($potensi->img) {
            Storage::disk('public')->delete($potensi->img);
        }

        $potensi->delete();

        return back()->with('success', 'Potensi berhasil dihapus.');
    }

    public function addGaleri(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string|max:255',
        ]);

        $validated['type'] = 'galeri';
        $validated['short_desc'] = null;
        $validated['img'] = $request->file('img')->store('galeri', 'public');

        PotensiGaleri::create($validated);

        return back()->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function modifyGaleri(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:potensi_galeri,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string|max:255',
        ]);

        $galeri = PotensiGaleri::where('id', $validated['id'])
            ->where('type', 'galeri')
            ->firstOrFail();

        $galeri->title = $validated['title'];
        $galeri->short_desc = null;

        if ($request->hasFile('img')) {
            if ($galeri->img) {
                Storage::disk('public')->delete($galeri->img);
            }

            $galeri->img = $request->file('img')->store('galeri', 'public');
        }

        $galeri->save();

        return back()->with('success', 'Galeri berhasil diperbarui.');
    }

    public function removeGaleri(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:potensi_galeri,id',
        ]);

        $galeri = PotensiGaleri::where('id', $validated['id'])
            ->where('type', 'galeri')
            ->firstOrFail();

        if ($galeri->img) {
            Storage::disk('public')->delete($galeri->img);
        }

        $galeri->delete();

        return back()->with('success', 'Galeri berhasil dihapus.');
    }
}