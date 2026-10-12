<?php

namespace Tests\Feature;

use App\Models\PojokWarga;
use App\Models\PotensiGaleri;
use App\Models\SiteContent;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BerandaTest extends TestCase
{
    protected function tearDown(): void
    {
        // Pastikan user admin utama tetap ada dan kredensialnya tidak berubah
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

    public function test_guest_can_access_beranda_page_with_dynamic_data(): void
    {
        $response = $this->get('/beranda');

        $response->assertStatus(200);
        $response->assertSee('Smart Village');
        $response->assertSee('Desa Cimulang');
        $response->assertSee('Pojok Warga');
        $response->assertSee('Potensi');
    }

    public function test_admin_can_access_beranda_management_page(): void
    {
        $admin = $this->getAdminUser();

        $response = $this->actingAs($admin)->get('/admin/beranda');

        $response->assertStatus(200);
        $response->assertSee('Kustomisasi Konten Hero');
        $response->assertSee('Judul Utama (Title)');
        $response->assertSee('Deskripsi Singkat');
    }

    public function test_admin_updates_hero_content_and_guest_beranda_reflects_changes(): void
    {
        Storage::fake('public');
        $admin = $this->getAdminUser();

        $fakeImage = UploadedFile::fake()->create('hero_banner.jpg', 500, 'image/jpeg');

        $newTitle = 'Smart Village Cimulang Mandiri';
        $newDescription = 'Desa Cimulang bertransformasi digital secara terpadu untuk kemajuan seluruh warga.';

        $response = $this->actingAs($admin)->patch('/admin/beranda/update-hero', [
            'hero_title' => $newTitle,
            'hero_description' => $newDescription,
            'hero_image' => $fakeImage,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Pastikan data tersimpan di database SiteContent
        $this->assertDatabaseHas('site_contents', [
            'page' => 'beranda',
            'key' => 'hero_title',
            'value' => $newTitle,
        ]);
        $this->assertDatabaseHas('site_contents', [
            'page' => 'beranda',
            'key' => 'hero_description',
            'value' => $newDescription,
        ]);

        // Verifikasi file tersimpan di storage
        $savedImage = SiteContent::where('page', 'beranda')->where('key', 'hero_image')->value('value');
        $this->assertNotNull($savedImage);
        $storagePath = str_replace('storage/', '', $savedImage);
        Storage::disk('public')->assertExists($storagePath);

        // Kunjungi halaman guest /beranda dan pastikan konten baru tampil
        $guestResponse = $this->get('/beranda');
        $guestResponse->assertStatus(200);
        $guestResponse->assertSee('Cimulang Mandiri');
        $guestResponse->assertSee($newDescription);
        $guestResponse->assertSee($savedImage);
    }

    public function test_public_api_returns_beranda_content(): void
    {
        $response = $this->getJson('/api/v1/beranda');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'hero' => [
                    'hero_title',
                    'hero_description',
                    'hero_image',
                    'hero_image_url',
                ],
                'latest_news',
                'gallery',
                'contact' => [
                    'alamat',
                    'email',
                    'whatsapp',
                    'instagram',
                ],
            ],
        ]);
    }

    public function test_admin_api_can_fetch_and_update_hero(): void
    {
        Storage::fake('public');
        $admin = $this->getAdminUser();
        $token = $admin->createToken('admin-test-token')->plainTextToken;

        // 1. Get Hero
        $getResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/v1/admin/beranda/hero');

        $getResponse->assertStatus(200);
        $getResponse->assertJson(['success' => true]);

        // 2. Update Hero
        $fakeImage = UploadedFile::fake()->create('api_hero.png', 300, 'image/png');

        $patchResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->postJson('/api/v1/admin/beranda/hero', [
                'hero_title' => 'Smart Village Inovatif 2026',
                'hero_description' => 'Deskripsi hero inovatif dari update API.',
                'hero_image' => $fakeImage,
            ]);

        $patchResponse->assertStatus(200);
        $patchResponse->assertJson([
            'success' => true,
            'data' => [
                'hero_title' => 'Smart Village Inovatif 2026',
                'hero_description' => 'Deskripsi hero inovatif dari update API.',
            ],
        ]);
    }
}
