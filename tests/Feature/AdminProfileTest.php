<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminProfileTest extends TestCase
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

    private function createTestUser(): User
    {
        return User::create([
            'name' => 'Test User',
            'username' => 'test_' . uniqid(),
            'email' => 'test_' . uniqid() . '@desa.id',
            'password' => Hash::make('password123'),
        ]);
    }

    public function test_admin_can_view_profile_page(): void
    {
        $user = $this->createTestUser();

        $response = $this->actingAs($user)->get('/admin/profile');

        $response->assertStatus(200);
        $response->assertSee('Edit Profil Admin');
        $response->assertSee($user->name);
        $response->assertSee($user->username);
        $response->assertSee($user->email);

        $user->delete();
    }

    public function test_admin_updates_name_username_and_email_without_password_change(): void
    {
        $user = $this->createTestUser();
        $oldPassword = $user->password;

        $response = $this->actingAs($user)->put('/admin/profile', [
            'name' => 'Admin Baru Cimulang',
            'username' => 'admin_cimulang_' . uniqid(),
            'email' => 'admin_' . uniqid() . '@desa.id',
            'password' => '', // kosong
        ]);

        $response->assertRedirect('/admin/profile');
        $response->assertSessionHas('success');

        $user->refresh();
        $this->assertEquals('Admin Baru Cimulang', $user->name);
        $this->assertEquals($oldPassword, $user->password);

        $user->delete();
    }

    public function test_admin_updates_password_logs_out_other_sessions(): void
    {
        $user = $this->createTestUser();
        $sessionId = 'other_device_session_' . uniqid();

        // Buat session tiruan untuk user di perangkat lain di database
        DB::table('sessions')->insert([
            'id' => $sessionId,
            'user_id' => $user->id,
            'ip_address' => '192.168.1.100',
            'user_agent' => 'Mozilla/5.0 Other Device',
            'payload' => serialize(['user_id' => $user->id]),
            'last_activity' => time(),
        ]);

        $this->assertDatabaseHas('sessions', [
            'id' => $sessionId,
            'user_id' => $user->id,
        ]);

        // Kirim request ubah password via form web
        $response = $this->actingAs($user)->put('/admin/profile', [
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'password' => 'passwordbaru123',
        ]);

        $response->assertRedirect('/admin/profile');
        $response->assertSessionHas('success');

        // Sesi perangkat lain harus sudah terhapus
        $this->assertDatabaseMissing('sessions', [
            'id' => $sessionId,
        ]);

        // Verifikasi password baru dapat digunakan untuk login
        $user->refresh();
        $this->assertTrue(Hash::check('passwordbaru123', $user->password));

        $user->delete();
    }

    public function test_api_update_profile_without_password_keeps_token_valid(): void
    {
        $user = $this->createTestUser();
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->putJson('/api/v1/auth/profile', [
                'name' => 'Nama Update API',
                'username' => 'api_username_' . uniqid(),
                'email' => 'api_' . uniqid() . '@desa.id',
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'token_refreshed' => false,
                'token' => null,
            ],
        ]);

        app('auth')->forgetGuards();

        // Token lama harus tetap bisa digunakan
        $checkResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/v1/auth/me');
        $checkResponse->assertStatus(200);

        $user->delete();
    }

    public function test_api_update_password_revokes_old_token_and_issues_new_token(): void
    {
        $user = $this->createTestUser();
        
        // Buat token pertama (yang digunakan untuk request)
        $currentToken = $user->createToken('current-device')->plainTextToken;
        
        // Buat token kedua (perangkat lain yang seharusnya logout)
        $otherToken = $user->createToken('other-device')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer ' . $currentToken)
            ->putJson('/api/v1/auth/profile', [
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'password' => 'newsecretpassword123',
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'token_refreshed' => true,
            ],
        ]);

        $newToken = $response->json('data.token');
        $this->assertNotEmpty($newToken);

        // Reset guard cache in test environment so it re-checks authorization headers
        app('auth')->forgetGuards();

        // Token lama dari perangkat saat ini sudah dicabut
        $oldTokenCheck = $this->withHeader('Authorization', 'Bearer ' . $currentToken)
            ->getJson('/api/v1/auth/me');
        $oldTokenCheck->assertStatus(401);

        app('auth')->forgetGuards();

        // Token dari perangkat lain juga harus dicabut (otomatis logout)
        $otherTokenCheck = $this->withHeader('Authorization', 'Bearer ' . $otherToken)
            ->getJson('/api/v1/auth/me');
        $otherTokenCheck->assertStatus(401);

        app('auth')->forgetGuards();

        // Token baru harus bisa mengakses endpoint
        $newTokenCheck = $this->withHeader('Authorization', 'Bearer ' . $newToken)
            ->getJson('/api/v1/auth/me');
        $newTokenCheck->assertStatus(200);
        $newTokenCheck->assertJson([
            'success' => true,
            'data' => [
                'id' => $user->id,
            ],
        ]);

        $user->delete();
    }
}
