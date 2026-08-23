<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class VisiMisiController extends Controller
{
    public function modifyVisi(Request $request) {
        $request->validate([
            'visi' => 'required|string'
        ]);

        $visi = SiteContent::where('page', 'visi_misi')->where('key', 'visi')->firstOrFail();
        $visi->value = $request->visi;
        $visi->save();

        return redirect()->back()->with('success', 'Visi berhasil diupdate!');
    }

    public function addMisi(Request $request) {
        $request->validate([
            'misi' => 'required|string'
        ]);

        $misi = SiteContent::where('page', 'visi_misi')->where('key', 'misi')->firstOrFail();
        $misiArray = json_decode($misi->value, true);

        if (!is_array($misiArray)) $misiArray = [];
        $misiArray[] = $request->misi;
        $misi->value = json_encode($misiArray);

        $misi->save();

        return redirect()->back()->with('success', 'Misi berhasil ditambahkan!');
    }
    public function modifyMisi(Request $request) {
        $request->validate([
            'id'   => 'required|integer|min:0', // indeks harus ≥ 0
            'misi' => 'required|string'
        ]);

        $misi = SiteContent::where('page', 'visi_misi')->where('key', 'misi')->firstOrFail();
        $misiArray = json_decode($misi->value, true);

        if (!is_array($misiArray)) $misiArray = [];

        $index = $request->id;
        if (!isset($misiArray[$index])) {
            return redirect()->back()->withErrors(['id' => 'id misi tidak ditemukan.']);
        }

        $misiArray[$index] = $request->misi;

        $misi->value = json_encode($misiArray);
        $misi->save();

        return redirect()->back()->with('success', 'Misi berhasil diperbarui!');
    }
    public function removeMisi(Request $request) {
        $request->validate([
            'id' => 'required|integer|min:0'
        ]);

        $misi = SiteContent::where('page', 'visi_misi')->where('key', 'misi')->firstOrFail();

        $misiArray = json_decode($misi->value, true);
        if (!is_array($misiArray)) {
            $misiArray = [];
        }

        $index = $request->id;
        if (!isset($misiArray[$index])) return redirect()->back()->withErrors(['id' => 'Misi tidak ditemukan.']);
        unset($misiArray[$index]);
        $misi->value = json_encode(array_values($misiArray));
        $misi->save();

        return redirect()->back()->with('success', 'Misi berhasil dihapus!');
    }
}
