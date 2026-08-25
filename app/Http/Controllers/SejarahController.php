<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class SejarahController extends Controller
{
    public function modifySejarah(Request $request)
    {
        $request->validate([
            'awal_mula_terbentuk' => 'required|string',
            'masa_perjuangan'  => 'required|string',
            'pemekaran_wilayah' => 'required|string',
        ]);

        // Simpan atau update setiap key
        $keys = ['awal_mula_terbentuk', 'masa_perjuangan', 'pemekaran_wilayah'];
        foreach ($keys as $key) {
            SiteContent::updateOrCreate(
                ['page' => 'sejarah', 'key' => $key],
                ['value' => $request->$key]
            );
        }

        return redirect()->back()->with('success', 'Sejarah berhasil diperbarui!');
    }
}
