<?php

namespace Tests\Feature;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_admin_pages_send_noindex_header(): void
    {
        $this->get('/admin/login')
            ->assertOk()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
    }

    public function test_admin_user_can_access_panel(): void
    {
        $this->actingAs(User::factory()->admin()->create());

        $this->get('/admin')->assertOk();
    }

    public function test_staff_user_can_access_panel(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get('/admin')->assertOk();
    }

    public function test_staff_cannot_view_users_resource(): void
    {
        $this->actingAs(User::factory()->create());

        $this->assertFalse(UserResource::canViewAny());
        $this->get('/admin/users')->assertForbidden();
    }

    public function test_admin_can_view_users_resource(): void
    {
        $this->actingAs(User::factory()->admin()->create());

        $this->assertTrue(UserResource::canViewAny());
        $this->get('/admin/users')->assertOk();
    }
}
