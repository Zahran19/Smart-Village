<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class VisiMisiController extends Controller
{
    // logic update visi
    public function updateVisi(Request $request, $id) {
        // validate input
        $request->validate([
            'isi_visi' => 'required|string'
        ]);

        // search data visi by id
        $visi = ::findOrFail($id);

        // update data and save string and paragraf
        $visi->isi = $request->isi_visi;
        $visi->save();

        // return succes and back to page
        return redirect()->back()->with('success', 'visi berhasil di update!');
    }

    public function updateMisi(Request $request, $id) {
        // validate input
        $request->validate([
            "misi" => 'required|array',
            'misi.*' => 'nullable|string' // Tiap baris boleh kosong, tapi kalau diisi harus string
        ]);

        // clean array , delete form input (kosong) yang di biarin kosong
        $misi_array = array_filter($request->misi);

        // search data misi by id
        $misi = ProfilDesa::findOrFail($id);

        // update data array, change array to json biar muat di simpen di kolom isi
        // array value di pake biar indexnya tetep urut dari 0
        $misi->isi = json_encode(array_values($misi_array));
        $misi->save();

        // return succes and back to page
        return redirect()->back()->with('success', 'Misi berhasil diperbarui!');
    }
}
