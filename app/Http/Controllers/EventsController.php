<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //This method needs to fetch the DB information and put it inside the Event card
    public function eventsCard(){
        //SELECT * FROM events
        $events = Event::all();
        
        $eventTitle = "This is the Event Title - but it needs to fetch from the info of the DB";
        $pageTitle = "Events Page";

        return view('events.events-list', [
            'eventTitle' => $eventTitle,
            'pageTitle' => $pageTitle
        ]);
    }


    // This method should fetch with information from the DB
    public function eventDetails($id = 1){

        return view('events.event-details');
    }
    

    // This method needs to put the information of the form in the DB
    public function create(){
        return view('events.events-create');
    }

    //This method gets the trail
    public function getTrail($id){
        return view('trails.trail-details');
    }

}
