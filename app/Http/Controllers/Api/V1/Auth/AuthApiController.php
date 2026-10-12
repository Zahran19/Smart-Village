<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{
    /**
     * Login admin dan dapatkan Sanctum API token.
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'username_or_email' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginInput = $request->input('username_or_email');
        $field = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $loginInput)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username_or_email' => ['Kredensial login tidak cocok dengan data kami.'],
            ]);
        }

        // Hapus token lama jika perlu, atau langsung buat token baru
        $token = $user->createToken('admin-api-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil.',
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                ],
                'token' => $token,
                'token_type' => 'Bearer',
            ],
        ]);
    }

    /**
     * Logout dan revoke token aktif.
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil. Token telah dicabut.',
        ]);
    }

    /**
     * Dapatkan data profil admin yang sedang login.
     */
    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Profil pengguna berhasil diambil.',
            'data' => $request->user(),
        ]);
    }

    /**
     * Perbarui profil admin via API.
     * Jika hanya mengubah nama, username, atau email -> token tetap aktif, tidak refresh token.
     * Jika mengubah password -> token diperbarui dan perangkat lain otomatis logout.
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $user = $request->user();

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
        $newToken = null;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
            $passwordChanged = true;
        }

        $user->save();

        if ($passwordChanged) {
            // Hapus token lain dan revoke token aktif saat ini
            $currentToken = $user->currentAccessToken();
            if ($currentToken) {
                $user->tokens()->where('id', '!=', $currentToken->id)->delete();
                $currentToken->delete();
            } else {
                $user->tokens()->delete();
            }

            // Hapus sesi web di database (jika ada) agar perangkat lain otomatis logout
            try {
                DB::table('sessions')->where('user_id', $user->id)->delete();
            } catch (\Exception $e) {}

            // Buat token baru (refresh token)
            $newToken = $user->createToken('admin-api-token')->plainTextToken;
        }

        return response()->json([
            'success' => true,
            'message' => $passwordChanged 
                ? 'Profil dan password berhasil diperbarui. Token baru telah diterbitkan dan sesi lain telah dicabut.' 
                : 'Profil berhasil diperbarui.',
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                ],
                'token_refreshed' => $passwordChanged,
                'token' => $newToken,
                'token_type' => $passwordChanged ? 'Bearer' : null,
            ],
        ]);
    }
}
