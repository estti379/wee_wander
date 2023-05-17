<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //This method select all events from the DB
    public function eventsCard(){
        //SELECT * FROM events
        $events = Event::all()->toArray();
        
        return view('events.events-list', [
            'events' => $events
        ]);

        /*
        Outdated
        $eventTitle = "This is the Event Title - but it needs to fetch from the info of the DB";
        $pageTitle = "Events Page";

        return view('events.events-list', [
            'eventTitle' => $eventTitle,
            'pageTitle' => $pageTitle
        ]);
        */
        
    }


    // This method should fetch with information from the DB
    public function eventDetails($id){
        $event = Event::find($id);
        return view('events.event-details', ['event' => $event]);
    }
    

    // This method redirect to create view
    public function create(){

        return view('events.events-create');
    }

    //this method stores the information on view on the DB
    public function store(request $request){
       
        $event = Event::create([
            'title' => $request->input('eventTitle'), //eventTitle is the name atr from input on create page
            'id_organizer'=> 1 //value 1 defined just to the store method work - this value needs to be changed after
        ]);
        return redirect('/events');
    }

    //method to edit event - for now just the title.
    public function edit($id){
        
        $event = Event::find($id); //Eloquent to connect to DB and find specific event by the id
        
        return view('events.events-edit')->with('event', $event);
    }


    public function update(Request $request, $id){
        
        $event = Event::where('id', $id)
            ->update([
                'title' => $request->input('eventTitle'), //eventTitle is the name atr from input on create page
                'id_organizer'=> 1 //value 1 defined just to the store method work - this value needs to be changed after
        ]);

        return redirect('/events');
    }

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
