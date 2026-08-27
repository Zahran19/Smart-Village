<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;
use Illuminate\Support\Facades\Storage; // tambahkan ini

class PemDesController extends Controller
{
    private function getStruktur() {
        return SiteContent::where('page', 'pemerintah_desa')
                          ->where('key', 'struktur_organisasi')
                          ->firstOrFail();
    }
    
    private function uploadProfileImage($file, $oldImage = null)
    {
        // Hapus file lama jika ada dan bukan default
        if ($oldImage && $oldImage !== 'images/pemdes/default.svg') {
            // Path relatif dari storage/public
            $oldPath = str_replace('storage/', '', $oldImage);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        // Simpan file baru
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('pemdes', $filename, 'public');
        // Kembalikan path yang bisa diakses via asset('storage/...')
        return 'storage/' . $path;
    }

    public function addPemDes(Request $request)
    {
        $request->validate([
            'profile_img' => 'nullable|image|max:2048', // nullable, max 2MB
            'nama'        => 'required|string',
            'jabatan'     => 'required|string',
        ]);

        $struktur = $this->getStruktur();
        $data = json_decode($struktur->value, true);
        if (!is_array($data)) {
            $data = [];
        }

        // Tentukan path gambar
        if ($request->hasFile('profile_img')) {
            $imagePath = $this->uploadProfileImage($request->file('profile_img'));
        } else {
            $imagePath = 'images/pemdes/default.svg';
        }

        $data[] = [
            'profile_img' => $imagePath,
            'nama'        => $request->nama,
            'jabatan'     => $request->jabatan,
        ];

        $struktur->value = json_encode($data);
        $struktur->save();

        return redirect()->back()->with('success', 'Anggota struktur berhasil ditambahkan.');
    }

    public function modifyPemDes(Request $request)
    {
        $request->validate([
            'id'          => 'required|integer|min:0',
            'profile_img' => 'nullable|image|max:2048', // nullable
            'nama'        => 'required|string',
            'jabatan'     => 'required|string',
        ]);

        $struktur = $this->getStruktur();
        $data = json_decode($struktur->value, true);
        if (!is_array($data)) {
            $data = [];
        }

        $index = (int) $request->id;
        if (!isset($data[$index])) {
            return redirect()->back()->withErrors(['id' => 'Indeks anggota tidak ditemukan.']);
        }

        // Ambil data lama
        $oldData = $data[$index];

        // Jika ada file baru, upload dan hapus yang lama
        if ($request->hasFile('profile_img')) {
            $imagePath = $this->uploadProfileImage(
                $request->file('profile_img'),
                $oldData['profile_img'] ?? null
            );
        } else {
            // Pertahankan gambar lama
            $imagePath = $oldData['profile_img'] ?? 'images/pemdes/default.svg';
        }

        // Update data
        $data[$index] = [
            'profile_img' => $imagePath,
            'nama'        => $request->nama,
            'jabatan'     => $request->jabatan,
        ];

        $struktur->value = json_encode($data);
        $struktur->save();

        return redirect()->back()->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function removePemDes(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|min:0',
        ]);

        $struktur = $this->getStruktur();
        $data = json_decode($struktur->value, true);
        if (!is_array($data)) {
            $data = [];
        }

        $index = (int) $request->id;
        if (!isset($data[$index])) {
            return redirect()->back()->withErrors(['id' => 'Indeks anggota tidak ditemukan.']);
        }

        // Opsional: hapus file gambar jika bukan default
        $imagePath = $data[$index]['profile_img'] ?? null;
        if ($imagePath && $imagePath !== 'images/pemdes/default.svg') {
            $oldPath = str_replace('storage/', '', $imagePath);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        unset($data[$index]);
        $data = array_values($data);

        $struktur->value = json_encode($data);
        $struktur->save();

        return redirect()->back()->with('success', 'Anggota struktur berhasil dihapus.');
    }
}