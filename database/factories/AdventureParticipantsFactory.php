<?php

namespace Database\Factories;

use App\Models\Adventure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdventureParticipants>
 */
class AdventureParticipantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $done = false;
        $i = 0;
        do{
            $adventure_id = rand(1, 10);
            $participant_id = rand(1, 10);
            $adventure = Adventure::find($adventure_id);
            if( isSet($adventure) ){
                $participantList = Adventure::find($adventure_id)->participants->where("id", $participant_id);
            } else {
                $participantList  = array();
            }

            

            if( count($participantList) == 0 ||  $i == 100 ){
                $done = true;   
            }
            $i++;
        } while(!$done);
        return [
            'adventure_id' => $adventure_id,
            'participant_id' => $participant_id,
        ];
    }
}
