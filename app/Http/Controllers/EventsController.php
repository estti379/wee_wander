<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    //This function needs to fetch the DB information and put it inside the Event card
    public function eventsCard(){
        $eventTitle = "This is the Event Title - but it needs to fetch from the info of the DB";
        $pageTitle = "Events Page";

        return view('events.events-list', [
            'eventTitle' => $eventTitle,
            'pageTitle' => $pageTitle
        ]);
    }


    // This function should fetch with information from the DB
    public function eventDetails($id = 1){

        return view('events.event-details');
    }
    

    // This function needs to put the information of the form in the DB
    public function create(){
        return view('events.events-create');
    }


}
