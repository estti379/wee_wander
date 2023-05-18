<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Adventure;
use App\Models\AdventureParticipants;
use App\Models\Event;
use App\Models\Route;
use App\Models\RouteParticipants;
use App\Models\Trail;
use App\Models\User;
use Illuminate\Database\Seeder;

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
        for ($i=0; $i < 4; $i++) { 
            RouteParticipants::factory(1)->create();
        }
        for ($i=0; $i < 4; $i++) { 
            AdventureParticipants::factory(1)->create();
        }
        
    }


}
