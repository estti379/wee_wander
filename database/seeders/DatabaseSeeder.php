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

        $this->call(UserSeeder::class, false, ['count' => 200]);
        $this->call(EventSeeder::class, false, ['count' => 200]);
        $this->call(TrailSeeder::class);
        $this->call(AdventureSeeder::class, false, ['count' => 200]);
        $this->call(RouteSeeder::class, false, ['count' => 200]);
    }


}
