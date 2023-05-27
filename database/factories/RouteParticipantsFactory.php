<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RouteParticipants>
 */
class RouteParticipantsFactory extends Factory
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
            $route_id = rand(1, 10);
            $participant_id = rand(1, 10);
            $route = Route::find($route_id);
            if( isSet($route) ){
                $participantList = Route::find($route_id)->participants->where("id", $participant_id);
            } else {
                $participantList = array();
            }

            

            if( count($participantList) == 0 ||  $i == 100 ){
                $done = true;   
            }
            $i++;
        } while(!$done);

        return [
            'route_id' => $route_id,
            'participant_id' => $participant_id,
        ];
        
    }
}
