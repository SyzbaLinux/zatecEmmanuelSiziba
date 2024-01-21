<?php

namespace Database\Factories;

use App\Models\FavouriteArtist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FavouriteArtistFactory extends Factory
{
    protected $model = FavouriteArtist::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'artist_id' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
