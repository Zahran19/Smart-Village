<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\PojokWarga;
use App\Models\PesanWarga;
use App\Models\WebVisit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardAdminTest extends TestCase
{
    public function test_public_contact_form_stores_pesan_warga(): void
    {
        $response = $this->post('/kontak/kirim-pesan', [
            'nama' => 'Warga Tester',
            'no_telepon' => '089911223344',
            'pesan' => 'Testing pesan aspirasi warga dari web form.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('pesan_wargas', [
            'nama' => 'Warga Tester',
            'no_telepon' => '089911223344',
        ]);
    }

    public function test_api_public_stores_pesan_warga(): void
    {
        $response = $this->postJson('/api/v1/pesan-warga', [
            'nama' => 'Warga API Tester',
            'no_telepon' => '081234567899',
            'pesan' => 'Testing kirim pesan via API v1.',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => ['id', 'nama', 'no_telepon', 'pesan', 'status', 'created_at'],
        ]);
    }

    public function test_admin_dashboard_renders_with_dynamic_data(): void
    {
        $admin = User::first() ?? User::factory()->create();

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Total Berita');
        $response->assertSee('Total Kunjungan');
        $response->assertDontSee('Kunjungan Periode');
        $response->assertSee('Grafik Kunjungan Web');
        $response->assertSee('Pesan Warga');
    }

    public function test_admin_dashboard_renders_with_filters(): void
    {
        $admin = User::first() ?? User::factory()->create();

        // Test default dashboard (yearly)
        $responseDefault = $this->actingAs($admin)->get('/admin/dashboard');
        $responseDefault->assertStatus(200);
        $responseDefault->assertSee('Semua Tahun');
        $responseDefault->assertDontSee('minutes ago');

        // Test filter tahunan
        $responseYearly = $this->actingAs($admin)->get('/admin/dashboard?period=yearly');
        $responseYearly->assertStatus(200);

        // Test filter spesifik tahun via dropdown
        $responseYearSelect = $this->actingAs($admin)->get('/admin/dashboard?year=2026');
        $responseYearSelect->assertStatus(200);

        // Test filter pesan warga dengan start_date & end_date (vanillajs-datepicker)
        $responsePesan = $this->actingAs($admin)->get('/admin/dashboard?start_date=2026-10-01&end_date=2026-10-12&open_modal=pesan');
        $responsePesan->assertStatus(200);
        $responsePesan->assertSee('Semua Pesan Warga');
        $responsePesan->assertDontSee('minutes ago');
    }

    public function test_api_auth_login_and_protected_stats(): void
    {
        // Login API
        $responseLogin = $this->postJson('/api/v1/auth/login', [
            'username_or_email' => 'admin',
            'password' => 'admin',
        ]);

        $responseLogin->assertStatus(200);
        $responseLogin->assertJsonStructure([
            'success',
            'data' => [
                'user' => ['id', 'name', 'username'],
                'token',
            ],
        ]);

        $token = $responseLogin->json('data.token');

        // Panggil endpoint protected dashboard stats dengan token
        $responseStats = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/v1/admin/dashboard-stats?period=monthly&year=2026');

        $responseStats->assertStatus(200);
        $responseStats->assertJsonStructure([
            'success',
            'data' => [
                'total_berita',
                'web_visits' => [
                    'period',
                    'labels',
                    'values',
                    'period_total',
                ],
                'pesan_warga' => [
                    'total',
                    'unread_count',
                    'latest_messages',
                ],
            ],
        ]);
    }
}
