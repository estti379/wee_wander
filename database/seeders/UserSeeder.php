<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($count = 1): void
    {

        User::factory($count)->create();
        if( !User::where('username', 'test')->orwhere('email', 'test@example.commie')->exists() )
        User::create([
            'username' => 'test',
            'password' => password_hash("password", PASSWORD_DEFAULT),
            'email' => 'test@example.commie',
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'picture' => fake()->imageUrl($width=200, $height=200),
            'description' => fake()->text(100),
            'car_owned' => "hidden",
            'driver_license' => "hidden",
        ]);
    }
}
