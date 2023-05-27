<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Adventure;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdventureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($count = 1): void
    {
        Adventure::factory($count)->create();
        for ($i=1; $i < Adventure::count(); $i++) {
            $adventure = Adventure::find($i); 
            $trekkers = rand(1, min(20, User::count()) );
            do { 
                $participant = rand(1, User::count());
                $canAddParticipant = $adventure->participants()->where('id', $participant)->count() == 0;
                if($canAddParticipant){
                    $adventure->participants()->attach($participant);
                    $trekkers--;
                }
            } while($trekkers > 0);
        }
    }
}
