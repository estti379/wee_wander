<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trails>
 */
class TrailsFactory extends Factory
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
        return [
            'name' => fake()->words(rand(1,4), true),
            'distance' => rand(500, 2000),
            'location_long' => $long,
            'location_latit' => $lati,
        ];
    }
}
