<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class KontakController extends Controller
{
    public function modifyKontak(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $exists = SiteContent::where('page', 'kontak')
            ->where('key', $request->key)
            ->exists();

        if (!$exists) {
            return redirect()->back()
                ->with('error', 'Terjadi Kesalahan! Coba lagi nanti');
        }

        SiteContent::where('page', 'kontak')
            ->where('key', $request->key)
            ->update([
                'value' => $request->value,
            ]);

        return redirect()->back()
            ->with('success', 'Kontak berhasil diperbarui!');
    }
}
