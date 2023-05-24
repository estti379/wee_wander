<?php

namespace Database\Factories;

use App\Models\Adventure;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startAdventure= rand(1, Adventure::count());
        $endAdventure = rand(1, Adventure::count());
        return [
            'start_location_long' => Adventure::find($startAdventure)->trail()->first()->location_long,
            'start_location_latit' => Adventure::find($startAdventure)->trail()->first()->location_latit,
            'end_location_long' => Adventure::find($endAdventure)->trail()->first()->location_long,
            'end_location_latit' => Adventure::find($endAdventure)->trail()->first()->location_latit,
            'distance' => rand(2, 20),
            'start_date' => $this->faker->dateTimeBetween("-30 day", "+30 day"),
            'price' => (string)rand(600, 4000)/100,
            'max_seats' => rand(1, 4),
            'bike_capacity' => rand(1, 6),
            'pets_allowed' => $this->faker->boolean(),
            'smokers_allowed' => $this->faker->boolean(),
            'luggage' => $this->faker->boolean(),
            'carowner_id' => rand(1, User::count()),
            'start_adventure_id' => $startAdventure,
            'end_adventure_id' => $endAdventure,

        ];
    }
}
