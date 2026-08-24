<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class KontakController extends Controller
{
    public function modifyKontak(Request $request) {
        // validate input
        $request->validate([    
            'key' => 'required|string',  // email, alamat, instagram, wa
            'value' => 'required|string'
        ]);

        // Cari data <sp></sp>esifik di page 'kontak' berdasarkan key yang dilempar dari form
        $kontak = SiteContent::where('page', 'kontak')->where('key', $request->key)->firstOrFail();

        // replace value lama dengan new value
        $kontak->value = $request->value;
        $kontak->save();

        // return page messages success
        return redirect()->back()->with('success', 'Data kontak berhasil diupdate!');
    }
}
