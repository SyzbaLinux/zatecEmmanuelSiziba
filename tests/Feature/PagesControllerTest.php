<?php

namespace Tests\Feature;

use App\Models\FavouriteAlbum;
use App\Models\FavouriteArtist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use App\Models\User;

class PagesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_home_page()
    {
        $response = $this->get('/'); // check if user can view homepage
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_user_can_view_artists_page()
    {
        // Test if user can see artists page
        $response = $this->get('/artists');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_user_can_view_albums_page()
    {
        // Test if user can see artists page
        $response = $this->get('/albums');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_user_can_add_artists_favourites()
    {

        // Create a user for testing

        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Example data for the artist
        $artistData = [
            'name'  => 'ArtistName',
            'url'   => 'https://example.com/artist',
            'mbid'  => '12345',
            'image' => [
                '3' => [
                    '#text' => 'https://example.com/artist-image.jpg',
                ],
            ],
        ];

        // Simulate the request to the 'artistLike' method with the provided data
        $response = $this->followingRedirects()->post('/artists/like', $artistData);

        // Assert that the response has the expected status code
        $response->assertStatus(Response::HTTP_OK);

        // Assert that the database has the expected data
        $this->assertDatabaseHas('favourite_artists', [
            'user_id'     => $user->id, // Access the user ID from the authenticated user
            'artist_name' => $artistData['name'],
            'url'         => $artistData['url'],
            'mbid'        => $artistData['mbid'],
            'image'       => $artistData['image'][3]['#text'],
        ]);
    }

    public function test_user_can_add_album_favourites()
    {

        $user = User::factory()->create();
        // Authenticate the user
        $this->actingAs($user);


        $albumData = [
            'name'  => 'ExampleArtistName',
            'url'   => 'https://example.com/artist',
            'mbid'  => '12345',
            'image' => [
                '3' => [
                    '#text' => 'https://example.com/artist-image.jpg',
                ],
            ],
        ];

        $response = $this->followingRedirects()->post('/albums/like', $albumData);
        $response->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('favourite_albums', [
            'user_id'     => $user->id,
            'album_name' => $albumData['name'],
            'url'         => $albumData['url'],
            'mbid'        => $albumData['mbid'],
            'image'       => $albumData['image'][3]['#text'],
        ]);
    }
}
