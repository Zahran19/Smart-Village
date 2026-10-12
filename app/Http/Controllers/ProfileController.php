<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman edit profil admin.
     */
    public function index()
    {
        return view('admin.profile_admin');
    }

    /**
     * Proses pembaruan profil admin.
     * Jika hanya mengubah nama, username, atau email -> sesi/token tetap aktif.
     * Jika mengubah password -> pengguna lain di perangkat/sesi lain otomatis logout.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required', 
                'string', 
                'max:50', 
                'alpha_dash', 
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => ['nullable', 'string', 'min:6'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, strip, dan garis bawah.',
            'username.unique' => 'Username sudah digunakan oleh akun lain.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh akun lain.',
            'password.min' => 'Password baru minimal harus 6 karakter.',
        ]);

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];

        $passwordChanged = false;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
            $passwordChanged = true;
        }

        $user->save();

        if ($passwordChanged) {
            // Hapus sesi pengguna lain di database (selain sesi yang sedang aktif ini)
            $currentSessionId = session()->getId();
            try {
                DB::table('sessions')
                    ->where('user_id', $user->id)
                    ->where('id', '!=', $currentSessionId)
                    ->delete();
            } catch (\Exception $e) {
                // Ignore jika session driver bukan database
            }

            // Revoke semua personal access token API milik user ini agar perangkat lain harus login ulang
            if (method_exists($user, 'tokens')) {
                $user->tokens()->delete();
            }

            // Pertahankan login user saat ini dengan sesi yang telah diregenerasi
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('profile_admin')
                ->with('success', 'Profil dan password berhasil diperbarui. Sesi akun di perangkat lain otomatis logout.');
        }

        return redirect()->route('profile_admin')
            ->with('success', 'Profil admin berhasil diperbarui.');
    }
}
