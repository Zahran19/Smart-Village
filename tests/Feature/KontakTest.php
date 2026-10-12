<?php

namespace Tests\Feature;

use App\Models\SiteContent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class KontakTest extends TestCase
{
    protected function tearDown(): void
    {
        // Pastikan akun admin utama tetap ada
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'email' => 'admin@cimulang.desa.id',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
            ]
        );
        app('auth')->forgetGuards();
        parent::tearDown();
    }

    private function getAdminUser(): User
    {
        return User::firstOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'email' => 'admin@cimulang.desa.id',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
            ]
        );
    }

    public function test_admin_can_access_kontak_page_without_error(): void
    {
        $admin = $this->getAdminUser();

        $response = $this->actingAs($admin)->get('/admin/kontak');

        $response->assertStatus(200);
        $response->assertSee('Data Kontak Desa');
        $response->assertSee('Alamat');
        $response->assertSee('Email');
        $response->assertSee('Whatsapp');
        $response->assertSee('Instagram');
        $response->assertSee('Link Embed Google Maps');
    }

    public function test_admin_can_update_kontak_via_web(): void
    {
        $admin = $this->getAdminUser();

        $newAddress = 'Jl. Raya Cimulang No. 99 Rancabungur, Kab. Bogor';

        $response = $this->actingAs($admin)->patch('/admin/kontak', [
            'key' => 'alamat',
            'value' => $newAddress,
        ]);

        $response->assertRedirect('/admin/kontak');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('site_contents', [
            'page' => 'kontak',
            'key' => 'alamat',
            'value' => $newAddress,
        ]);

        // Verifikasi di halaman admin kontak
        $adminPageResponse = $this->actingAs($admin)->get('/admin/kontak');
        $adminPageResponse->assertStatus(200);
        $adminPageResponse->assertSee($newAddress);
    }

    public function test_guest_can_access_public_kontak_page(): void
    {
        $response = $this->get('/kontak');

        $response->assertStatus(200);
        $response->assertSee('Kontak Desa');
        $response->assertSee('Informasi Kontak');
        $response->assertSee('Kirim Pesan dan Lokasi');
    }

    public function test_public_api_returns_contact_information(): void
    {
        $response = $this->getJson('/api/v1/kontak');

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'alamat',
                    'email',
                    'whatsapp',
                    'instagram',
                    'google_maps_embed',
                ],
            ]);
    }

    public function test_admin_api_can_fetch_and_update_contact(): void
    {
        $admin = $this->getAdminUser();
        $token = $admin->createToken('admin_kontak_test')->plainTextToken;

        // Fetch
        $getResponse = $this->withToken($token)->getJson('/api/v1/admin/kontak');
        $getResponse->assertStatus(200)
            ->assertJsonPath('success', true);

        // Update
        $updatedEmail = 'kontak_resmi@cimulang.desa.id';
        $updateResponse = $this->withToken($token)->patchJson('/api/v1/admin/kontak', [
            'key' => 'email',
            'value' => $updatedEmail,
        ]);

        $updateResponse->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.value', $updatedEmail);

        $this->assertDatabaseHas('site_contents', [
            'page' => 'kontak',
            'key' => 'email',
            'value' => $updatedEmail,
        ]);
    }
}
