<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class GoogleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRedirectToGoogle()
    {
        $response = $this->get('login/google'); // Replace with your actual route
        $response->assertStatus(302); // Assuming it redirects
    }

    public function testHandleGoogleCallbackExistingUser()
    {
        // Mock the Socialite facade to simulate a user from Google
        $mockUser = [
            'id'    => 'google_user_id',
            'name'  => 'John Doe',
            'email' => 'john@example.com',
        ];

        Socialite::shouldReceive('driver->user')->andReturn((object)$mockUser);

        // Create a user in the database with the same Google ID
        $existingUser = User::factory()->create(['google_id' => $mockUser['id']]);



        $response = $this->get('/login/google/callback');

        $response->assertStatus(302); // Assuming it redirects
        $this->assertAuthenticatedAs($existingUser);
    }

    public function testHandleGoogleCallbackNewUser()
    {
        // Mock the Socialite facade to simulate a new user from Google
        $mockUser = [
            'id'    => 'new_google_user_id',
            'name'  => 'Jane Doe',
            'email' => 'jane@example.com',
        ];

        Socialite::shouldReceive('driver->user')->andReturn((object)$mockUser);

        $response = $this->get('/login/google/callback');

        $response->assertStatus(302); // Assuming it redirects

        // Assert that the new user is created in the database
        $this->assertDatabaseHas('users', [
            'google_id' => $mockUser['id'],
            'name'      => $mockUser['name'],
            'email'     => $mockUser['email'],
        ]);

        // Assert that the new user is authenticated
        $this->assertAuthenticated();
    }
}
