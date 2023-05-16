<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $car_owned = "";
        $random = rand(0, 2);
        if($random == 0){
            $car_owned = "yes";
        } else if($random == 1){
            $car_owned = "no";
        } else if($random == 2){
            $car_owned = "hidden";
        }

        $driver_license = "";
        $random = rand(0, 2);
        if($random == 0){
            $driver_license = "yes";
        } else if($random == 1){
            $driver_license = "no";
        } else if($random == 2){
            $driver_license = "hidden";
        }


        return [
            'username' => fake()->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => fake()->unique()->safeEmail(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'picture' => fake()->imageUrl($width=200, $height=200),
            'description' => fake()->text(100),
            'car_owned' => $car_owned,
            'driver_license' => $driver_license,

        ];
    }

}
