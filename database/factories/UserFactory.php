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

        $firstname = fake()->firstName();
        $lastname = fake()->lastName();

        $randomImageUrl = fake()->imageUrl(200, 200, $firstname." ".$lastname);
        $URLsnippets = explode("+", $randomImageUrl);
        $randomImageUrl = $URLsnippets[0]."+".$URLsnippets[1];

        return [
            'username' => fake()->userName(),
            'password' => '$10$8S2oU9XGtvKV1y6yQaa2MulsZ3dhQMBn5Y.8HFWJi1f2kUwj6MNNu',// password //password_hash('password',  PASSWORD_DEFAULT),
            'email' => fake()->unique()->safeEmail(),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'picture' => $randomImageUrl,
            'description' => fake()->text(100),
            'car_owned' => $car_owned,
            'driver_license' => $driver_license,

        ];
    }

}
