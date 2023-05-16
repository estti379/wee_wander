<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adventure>
 */
class AdventureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = $this->faker->dateTimeBetween("-30 day", "+30 day");;
        $helper_date = clone $start_date;
        $helper_date->modify("-1 day");
        $due_date = $this->faker->dateTimeBetween($helper_date, $start_date);
        return [
            'id_event' => rand(1, 10),
            'id_trail' => rand(1, 10),
            'start_date' => $start_date,
            'due_date' => $due_date,
        ];
    }
}
