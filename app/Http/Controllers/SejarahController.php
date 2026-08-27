<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;

class SejarahController extends Controller
{
    public function modifySejarah(Request $request)
    {
        $request->validate([
            'key'   => 'required|string',
            'value' => 'required|string',
        ]);

        $affected = SiteContent::where('page', 'sejarah')
                            ->where('key', $request->key)
                            ->update(['value' => $request->value]);

        if ($affected === 0) {
            return redirect()->back()->withErrors(['key' => 'Data dengan key tersebut tidak ditemukan.']);
        }

        return redirect()->back()->with('success', 'Sejarah berhasil diperbarui!');
    }
}
