<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
    public function should_be_able_to_authenticate_an_user()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    /**
    * @test
    */
    public function should_not_be_able_to_authenticate_an_nonexistent_user()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'false@email.com',
            'password' => '1234'
        ]);

        $response->assertStatus(401);
    }

    /**
    * @test
    */
    public function should_not_be_able_to_authenticate_with_incorrect_password()
    {
        $user = User::factory()->create()->toArray();

        $response = $this->postJson('/api/login', [
            ...$user,
            'password' => 'incorrectPassword'
        ]);

        $response->assertStatus(401);
        $response->assertJson([
            'message' => 'This User does not exist, check your details'
        ]);
    }
}
