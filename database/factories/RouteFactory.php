<?php

namespace Database\Factories;

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
        $long = (string)rand(5700000,6500000)/1000000;
        $lati = (string)rand(48400000,50200000)/1000000;
        $longB = (string)rand(5700000,6500000)/1000000;
        $latiB = (string)rand(48400000,50200000)/1000000;
        return [
            'start_location_long' => $long,
            'start_location_latit' => $lati,
            'end_location_long' => $longB,
            'end_location_latit' => $latiB,
            'distance' => rand(2, 20),
            'start_date' => $this->faker->dateTimeBetween("-30 day", "+30 day"),
            'price' => (string)rand(600, 4000)/100,
            'max_seats' => rand(1, 6),
            'bike_capacity' => rand(1, 6),
            'pets_allowed' => $this->faker->boolean(),
            'smokers_allowed' => $this->faker->boolean(),
            'luggage' => $this->faker->boolean(),
            'id_carowner' => rand(1, 10),
            'id_start_adventure' => rand(1, 10),
            'id_end_adventure' => rand(1, 10),

        ];
    }
}
