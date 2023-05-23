<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Route;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
        $maxUsers = count(User::all());
        $maxRoutes = count(Route::all());
        $done = false;
        $i = 0;
        do{
            $route_id = rand(1, $maxUsers);
            $participant_id = rand(1, $maxRoutes);
            $route = Route::find($route_id);

            $participantList = Route::query()->where('id', $route_id)->whereHas('participants', function (Builder $query, $participant_id) {
                    $query->where('id', '=', $participant_id);
                })->get();

                
                $isSeatFree = false;
                if($participantList != null) {
                    $isSeatFree = ( $route->max_seats - count($route->participants) ) > 0;
                }
                if(! $isSeatFree){
                    $participantList = array();
                }

            

            if( count($participantList) == 0 ||  $i == 100 ){
                $done = true;   
            }
            $i++;
        } while(!$done);
        error_log("New: ".$i);
        error_log("participant_id: ".$participant_id);
        error_log("route_id: ".$route_id);
        if($participantList != null) {
            error_log("find me: ".Route::find($route_id)->participants->where("id", $participant_id)->first()->id );
        } else {
            error_log("find me: empty");
        }
        error_log("Count: ".count($participantList) );
        error_log("free Seat: ".( ( $route->max_seats - count($route->participants) ) > 0 ) );
        error_log(" " );


        if($i == 101){
            $route_id = null;
            $participant_id == null;
        }
        return [
            'route_id' => $route_id,
            'participant_id' => $participant_id,
        ];
        
    }
}
