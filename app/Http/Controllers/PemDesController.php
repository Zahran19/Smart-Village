<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class PemDesController extends Controller
{
    private function getStruktur() {
        return SiteContent::where('page', 'pemerintah_desa')
                          ->where('key', 'struktur_organisasi')
                          ->firstOrFail();
    }
    public function addPemDes(Request $request) {
        $request->validate([
            'profile_img' => 'required|string',
            'nama'        => 'required|string',
            'jabatan'     => 'required|string',
        ]);

        $struktur = $this->getStruktur();

        $data = json_decode($struktur->value, true);
        if (!is_array($data)) {
            $data = [];
        }

        $data[] = [
            'profile_img' => $request->profile_img,
            'nama'        => $request->nama,
            'jabatan'     => $request->jabatan,
        ];

        $struktur->value = json_encode($data);
        $struktur->save();

        return redirect()->back()->with('success', 'Anggota struktur berhasil ditambahkan.');
    }
    public function modifyPemDes(Request $request) {
        $request->validate([
            'id'          => 'required|integer|min:0',
            'profile_img' => 'required|string',
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

        $data[$index] = [
            'profile_img' => $request->profile_img,
            'nama'        => $request->nama,
            'jabatan'     => $request->jabatan,
        ];

        $struktur->value = json_encode($data);
        $struktur->save();

        return redirect()->back()->with('success', 'Data anggota berhasil diperbarui.');
    }
    public function removePemDes(Request $request) {
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

        // Hapus item
        unset($data[$index]);

        $data = array_values($data);

        $struktur->value = json_encode($data);
        $struktur->save();

        return redirect()->back()->with('success', 'Anggota struktur berhasil dihapus.');
    }
}