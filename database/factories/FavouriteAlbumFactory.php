<?php

namespace Database\Factories;

use App\Models\FavouriteAlbum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FavouriteAlbumFactory extends Factory
{
    protected $model = FavouriteAlbum::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'albums_id' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
