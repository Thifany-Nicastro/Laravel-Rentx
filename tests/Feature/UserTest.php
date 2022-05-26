<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user()
    {
        // $this->withoutExceptionHandling();

        $user = User::factory()->make()->makeVisible(['password'])->toArray();

        $response = $this->postJson('/api/users', $user);

        // $response = $this->postJson('/api/users', [
        //     'name' => 'User name',
        //     'username' => 'user_name',
        //     'email' => 'user@email.com',
        //     'password' => 'password',
        //     'driver_license' => '123'
        // ]);

        $response->assertStatus(201);
    }

    public function test_cant_create_repeated_user()
    {
        $user = User::factory()->create()->makeVisible(['password'])->toArray();

        $response = $this->postJson('/api/users', $user);

        $response->assertStatus(422);
    }
}
