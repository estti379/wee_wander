<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    //
    public function eventsCard(){
        $eventTitle = "This is the Event Title - but it needs to fetch from the info of the DB";
        $pageTitle = "Events Page";

        return view('events.events-list', [
            'eventTitle' => $eventTitle,
            'pageTitle' => $pageTitle
        ]);
    }

    public function eventDetails($id = 1){

        return view('events.event-details');
    }
}
