<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent;
use App\Models\PesanWarga;

class KontakController extends Controller
{
    public function kirimPesan(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'no_telepon' => 'required|string|max:25',
            'pesan' => 'required|string|max:2000',
        ]);

        PesanWarga::create([
            'nama' => $validated['nama'],
            'no_telepon' => $validated['no_telepon'],
            'pesan' => $validated['pesan'],
            'status' => 'unread',
        ]);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Perangkat desa akan segera menindaklanjuti.');
    }

    public function modifyKontak(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $content = SiteContent::updateOrCreate(
            ['page' => 'kontak', 'key' => $validated['key']],
            ['value' => $validated['value'], 'type' => 'text']
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Kontak berhasil diperbarui!',
                'data'    => $content,
            ]);
        }

        return redirect()->route('admin.kontak')
            ->with('success', 'Kontak berhasil diperbarui!');
    }
}
