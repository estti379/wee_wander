<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Event;
use App\Models\Trail;
use App\Models\Adventure;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //This method select all events from the DB
    public function eventsCard(){
        //SELECT * FROM events
        $event = Event::all();

        return view('events.events-list', [
            'events' => $event,
        ]);
    }


    // Display event details - This should fetch with information from the DB
    public function eventDetails($id){
        $event = Event::find($id);
        $adventure = $event->adventures;
        /*
        return view('events.event-details')->with(['event' => $event,
                                                   'adventure' => $adventure]); //The with takes the $event as an object
        */
        return view('events.event-details',['adventure' => $adventure,
                                            'event' => $event]);
        }


    // This method redirect to create view
    public function create(){
        $trails = Trail::all();
        
        return view('events.events-create', ['trails' => $trails]);
    }

    //this method stores the information on view on the DB
    public function store(request $request){

        $event = Event::create([
            'title' => $request->input('eventTitle'), //eventTitle is the name atr from input on create page
            'organizer_id'=> 1 //value 1 defined just to the store method work - this value needs to be changed after
        ]);

        $adventure = Adventure::create([
            'trail_id' => $request->input('trail'),
            'event_id' => $event->id,
            'start_date' => new DateTime('now'),
            'due_date' => new DateTime('now')
        ]);
        return redirect('/events');
    }

    //method to edit event - for now just the title.
    public function edit($id){

        $event = Event::find($id); //Eloquent to connect to DB and find specific event by the id

        return view('events.events-edit')->with('event', $event);
    }

    //Update event information on DB - For now just id and id_organizer.
    //Needs to learn how to connect databases to change foreign keys.
    public function update(Request $request, $id){

        $event = Event::where('id', $id)
            ->update([
                'title' => $request->input('eventTitle'), //eventTitle is the name atr from input on create page
                'organizer_id'=> 1 //value 1 defined just to the store method work - this value needs to be changed after
        ]);

        return redirect('/events');
    }

    //Delete event of the DB
    public function destroy($id) {
        $event = Event::find($id);

        if($event){
            $event->delete();
        }

        return redirect('/events');
    }


    //This method gets the trail _ THE IS BUGGED - FIND A WAY TO FIX THIS
    public function getTrail($id){

        return view('trails.trail-details');
    }

}
