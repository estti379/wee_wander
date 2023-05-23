<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Event;
use App\Models\Route;
use App\Models\Trail;
use App\Models\Adventure;
use Illuminate\Database\Seeder;
use App\Models\RouteParticipants;
use Illuminate\Support\Facades\DB;
use App\Models\AdventureParticipants;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Event::factory(10)->create();
        Trail::factory(10)->create();
        Adventure::factory(10)->create();
        Route::factory(10)->create();
        for ($i=0; $i < 30; $i++) { 
            RouteParticipants::factory(1)->create();
        }
        for ($i=0; $i < 30; $i++) { 
            AdventureParticipants::factory(1)->create();
        }
        
       /* //create specific user test user
        DB::table('users')->insert([
            'username' => 'test',
            'password' => password_hash("password", PASSWORD_DEFAULT),
            'email' => fake()->unique()->safeEmail(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'picture' => fake()->imageUrl($width=200, $height=200),
            'description' => fake()->text(100),
            'car_owned' => "hidden",
            'driver_license' => "hidden",
        ]); */
    }


}
