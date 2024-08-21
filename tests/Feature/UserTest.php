<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Ensure that site is up and running.
     */
    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_cannot_access_posts(): void
    {
        $response = $this->get('/posts');

        $response->assertStatus(302);

        $response->assertRedirect('/login');
    }

    public function test_login_success_redirects_to_posts(): void
    {
        User::create([
            'name' => 'Jim',
            'email' => 'user@tester.co.uk',
            'password' => 'password12345'
        ]);

        $response = $this->post('/login', [
            'email' => 'user@tester.co.uk',
            'password' => 'password12345'
        ]);

        $response->assertStatus(302);

        $response->assertRedirect('/posts');
    }
}
