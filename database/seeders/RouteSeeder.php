<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Route;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($count = 1): void
    {
        Route::factory($count)->create();
        for ($i=1; $i < Route::count(); $i++) { 
            $route = Route::find($i);
            $riders = rand(1, min($route->max_seats, User::count()-1));
            do { 
                $participant = rand(1, User::count());
                $canAddParticipant = $participant != $route->carowner_id
                    && $route->participants()->where('id', $participant)->count() == 0;
                if($canAddParticipant){
                    $route->participants()->attach($participant);
                    $riders--;
                }
            } while($riders > 0);
        }

    }
}
