<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_login()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    public function test_cant_login_with_incorrect_credentials()
    {
        $user = User::factory()->create()->toArray();

        $response = $this->postJson('/api/login', [
            ...$user,
            'password' => 'incorrect'
        ]);

        $response->assertStatus(401);
        $response->assertJson([
            'message' => 'This User does not exist, check your details'
        ]);
    }
}
