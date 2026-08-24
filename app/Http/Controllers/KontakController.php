<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class KontakController extends Controller
{
    public function modifyKontak(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'email'  => 'required|email',
            'whatsapp' => 'required|string',
            'instagram' => 'required|string',
            'google_maps_embed' => 'nullable|string',
        ]);

        // Simpan atau update setiap key
        $keys = ['alamat', 'email', 'whatsapp', 'instagram', 'google_maps_embed'];
        foreach ($keys as $key) {
            SiteContent::updateOrCreate(
                ['page' => 'kontak', 'key' => $key],
                ['value' => $request->$key]
            );
        }

        return redirect()->back()->with('success', 'Kontak berhasil diperbarui!');
    }
}
