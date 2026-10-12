<?php

namespace Tests\Feature;

use App\Models\PojokWarga;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PojokWargaTest extends TestCase
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

    public function test_guest_can_access_pojok_warga_page_and_see_published_news(): void
    {
        $published = PojokWarga::create([
            'title' => 'Gotong Royong Warga Cimulang',
            'slug' => 'gotong-royong-warga-cimulang-' . uniqid(),
            'short_desc' => 'Kegiatan kerja bakti di RW 03.',
            'content' => 'Seluruh warga antusias mengikuti kegiatan kerja bakti.',
            'status' => 'published',
            'date_released' => now(),
        ]);

        $draft = PojokWarga::create([
            'title' => 'Rencana Rahasia Desa',
            'slug' => 'rencana-rahasia-desa-' . uniqid(),
            'short_desc' => 'Draf rencana kegiatan.',
            'content' => 'Belum boleh dipublikasikan ke warga.',
            'status' => 'draft',
            'date_released' => now(),
        ]);

        $response = $this->get('/pojok-warga');

        $response->assertStatus(200);
        $response->assertSee('Gotong Royong Warga Cimulang');
        $response->assertDontSee('Rencana Rahasia Desa');
    }

    public function test_guest_can_access_published_news_detail(): void
    {
        $published = PojokWarga::create([
            'title' => 'Penyaluran Bantuan Sosial 2026',
            'slug' => 'penyaluran-bansos-' . uniqid(),
            'short_desc' => 'Bansos disalurkan secara transparan.',
            'content' => 'Detail lengkap mengenai penyaluran bansos di balai desa.',
            'status' => 'published',
            'date_released' => now(),
        ]);

        $response = $this->get('/pojok-warga/' . $published->slug);

        $response->assertStatus(200);
        $response->assertSee('Penyaluran Bantuan Sosial 2026');
        $response->assertSee('Detail lengkap mengenai penyaluran bansos');
    }

    public function test_guest_cannot_access_draft_news_detail(): void
    {
        $draft = PojokWarga::create([
            'title' => 'Draft Berita Belum Tayang',
            'slug' => 'draft-berita-' . uniqid(),
            'short_desc' => 'Draft deskripsi.',
            'content' => 'Draft isi konten.',
            'status' => 'draft',
            'date_released' => now(),
        ]);

        $response = $this->get('/pojok-warga/' . $draft->slug);

        $response->assertStatus(404);
    }

    public function test_admin_can_access_admin_pojok_warga_page(): void
    {
        $admin = $this->getAdminUser();

        $berita = PojokWarga::create([
            'title' => 'Festival Panen Raya',
            'slug' => 'festival-panen-raya-' . uniqid(),
            'short_desc' => 'Kemeriahan panen raya desa.',
            'content' => 'Festival diadakan tahunan.',
            'status' => 'published',
            'date_released' => now(),
        ]);

        $response = $this->actingAs($admin)->get('/admin/pojok-warga');

        $response->assertStatus(200);
        $response->assertSee('Festival Panen Raya');
        $response->assertSee('Release');
    }

    public function test_admin_can_create_news_with_uploaded_photo(): void
    {
        Storage::fake('public');
        $admin = $this->getAdminUser();

        $uniq = uniqid();
        $title = 'Vaksinasi Massal Desa Cimulang ' . $uniq;
        $fakePhoto = UploadedFile::fake()->create('kegiatan.jpg', 300, 'image/jpeg');

        $payload = [
            'title' => $title,
            'short_desc' => 'Pelaksanaan vaksinasi di posyandu.',
            'content' => 'Vaksinasi diikuti oleh ratusan balita dan lansia.',
            'status' => 'published',
            'img' => $fakePhoto,
        ];

        $response = $this->actingAs($admin)->post('/admin/pojok-warga', $payload);

        $response->assertRedirect('/admin/pojok-warga');
        $this->assertDatabaseHas('pojok_wargas', [
            'title' => $title,
            'status' => 'published',
        ]);

        $created = PojokWarga::where('title', $title)->first();
        $this->assertNotNull($created);
        $this->assertNotNull($created->img);
        $this->assertStringContainsString('storage/pojok_warga/', $created->img);

        $storedRelativePath = str_replace('storage/', '', $created->img);
        Storage::disk('public')->assertExists($storedRelativePath);
    }

    public function test_admin_can_update_news_and_replace_photo(): void
    {
        Storage::fake('public');
        $admin = $this->getAdminUser();

        $uniq = uniqid();
        $initialTitle = 'Berita Uji Coba Update ' . $uniq;
        $updatedTitle = 'Berita Uji Coba Diperbarui ' . $uniq;

        // 1. Upload awal
        $oldPhoto = UploadedFile::fake()->create('foto_lama.jpg', 200, 'image/jpeg');
        $this->actingAs($admin)->post('/admin/pojok-warga', [
            'title' => $initialTitle,
            'short_desc' => 'Deskripsi lama.',
            'content' => 'Konten lama.',
            'status' => 'draft',
            'img' => $oldPhoto,
        ]);

        $berita = PojokWarga::where('title', $initialTitle)->first();
        $oldStoredPath = str_replace('storage/', '', $berita->img);
        Storage::disk('public')->assertExists($oldStoredPath);

        // 2. Update dengan foto baru
        $newPhoto = UploadedFile::fake()->create('foto_baru.jpg', 250, 'image/jpeg');
        $updateResponse = $this->actingAs($admin)->patch('/admin/pojok-warga', [
            'id' => $berita->id,
            'title' => $updatedTitle,
            'short_desc' => 'Deskripsi baru.',
            'content' => 'Konten baru telah direvisi.',
            'status' => 'published',
            'img' => $newPhoto,
        ]);

        $updateResponse->assertRedirect('/admin/pojok-warga');

        $berita->refresh();
        $this->assertEquals($updatedTitle, $berita->title);
        $this->assertEquals('published', $berita->status);

        $newStoredPath = str_replace('storage/', '', $berita->img);
        Storage::disk('public')->assertExists($newStoredPath);
        Storage::disk('public')->assertMissing($oldStoredPath);
    }

    public function test_admin_can_delete_news_and_photo_is_cleaned_up(): void
    {
        Storage::fake('public');
        $admin = $this->getAdminUser();

        $uniq = uniqid();
        $title = 'Berita Akan Dihapus ' . $uniq;
        $photo = UploadedFile::fake()->create('foto_hapus.jpg', 150, 'image/jpeg');
        $this->actingAs($admin)->post('/admin/pojok-warga', [
            'title' => $title,
            'short_desc' => 'Deskripsi sebelum dihapus.',
            'content' => 'Konten sebelum dihapus.',
            'status' => 'draft',
            'img' => $photo,
        ]);

        $berita = PojokWarga::where('title', $title)->first();
        $storedPath = str_replace('storage/', '', $berita->img);
        Storage::disk('public')->assertExists($storedPath);

        $deleteResponse = $this->actingAs($admin)->delete('/admin/pojok-warga', [
            'id' => $berita->id,
        ]);

        $deleteResponse->assertRedirect('/admin/pojok-warga');
        $this->assertDatabaseMissing('pojok_wargas', [
            'id' => $berita->id,
        ]);
        Storage::disk('public')->assertMissing($storedPath);
    }

    public function test_public_api_can_list_and_view_news(): void
    {
        $unique = uniqid();
        $news = PojokWarga::create([
            'title' => 'API Berita Publik ' . $unique,
            'slug' => 'api-berita-publik-' . $unique,
            'short_desc' => 'Deskripsi API publik.',
            'content' => 'Konten API publik lengkap.',
            'status' => 'published',
            'date_released' => now(),
        ]);

        // List
        $listResponse = $this->getJson('/api/v1/pojok-warga?search=' . $unique);
        $listResponse->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonFragment(['title' => 'API Berita Publik ' . $unique]);

        // Detail
        $detailResponse = $this->getJson('/api/v1/pojok-warga/' . $news->slug);
        $detailResponse->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.title', 'API Berita Publik ' . $unique);
    }

    public function test_admin_api_can_manage_news(): void
    {
        Storage::fake('public');
        $admin = $this->getAdminUser();
        $token = $admin->createToken('admin_test_token')->plainTextToken;

        $uniq = uniqid();
        $createdTitle = 'Berita Created via API ' . $uniq;
        $updatedTitle = 'Berita Updated via API ' . $uniq;

        // 1. Create via API
        $createResponse = $this->withToken($token)->postJson('/api/v1/admin/pojok-warga', [
            'title' => $createdTitle,
            'short_desc' => 'Deskripsi via API.',
            'content' => 'Konten via API.',
            'status' => 'published',
            'img' => UploadedFile::fake()->create('api_photo.jpg', 200, 'image/jpeg'),
        ]);

        $createResponse->assertStatus(201)
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.title', $createdTitle);

        $createdId = $createResponse->json('data.id');

        // 2. Get Detail via API
        $showResponse = $this->withToken($token)->getJson('/api/v1/admin/pojok-warga/' . $createdId);
        $showResponse->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.id', $createdId);

        // 3. Update via API
        $updateResponse = $this->withToken($token)->patchJson('/api/v1/admin/pojok-warga/' . $createdId, [
            'title' => $updatedTitle,
            'short_desc' => 'Deskripsi baru via API.',
            'content' => 'Konten baru via API.',
            'status' => 'draft',
        ]);

        $updateResponse->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.title', $updatedTitle)
            ->assertJsonPath('data.status', 'draft');

        // 4. Delete via API
        $deleteResponse = $this->withToken($token)->deleteJson('/api/v1/admin/pojok-warga/' . $createdId);
        $deleteResponse->assertStatus(200)
            ->assertJsonPath('success', true);

        $this->assertDatabaseMissing('pojok_wargas', [
            'id' => $createdId,
        ]);
    }

    public function test_archives_pagination_with_max_6_and_next_previous_buttons(): void
    {
        $createdIds = [];
        $batchUniq = uniqid('batch_');

        // Buat 9 berita: 2 untuk berita terbaru, 7 untuk arsip (sehingga ada 2 halaman: hal 1 = 6 berita, hal 2 = 1 berita)
        for ($i = 1; $i <= 9; $i++) {
            $news = PojokWarga::create([
                'title' => "Berita Seri Pagination {$batchUniq} Ke-{$i}",
                'slug' => "berita-seri-pagination-{$batchUniq}-ke-{$i}",
                'short_desc' => "Deskripsi berita pagination {$i}.",
                'content' => "Konten pagination {$i}.",
                'status' => 'published',
                'date_released' => now()->addMinutes($i),
            ]);
            $createdIds[] = $news->id;
        }

        try {
            // Halaman 1
            $responsePage1 = $this->get('/pojok-warga');
            $responsePage1->assertStatus(200);
            $responsePage1->assertSee('Arsip Berita');
            $responsePage1->assertSee('Next');
            $responsePage1->assertSee('Previous');
            $responsePage1->assertSee("Berita Seri Pagination {$batchUniq} Ke-7"); // masuk ke arsip hal 1 (karena 8 dan 9 ada di latest news)
            $responsePage1->assertDontSee("Berita Seri Pagination {$batchUniq} Ke-1"); // ada di hal 2 arsip

            // Halaman 2
            $responsePage2 = $this->get('/pojok-warga?page=2');
            $responsePage2->assertStatus(200);
            $responsePage2->assertSee('Next');
            $responsePage2->assertSee('Previous');
            $responsePage2->assertSee("Berita Seri Pagination {$batchUniq} Ke-1"); // tampil di hal 2 arsip
        } finally {
            PojokWarga::whereIn('id', $createdIds)->delete();
        }
    }
}

