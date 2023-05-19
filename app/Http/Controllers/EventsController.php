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
        $pageTitle = 'Events Lista Page';
        //SELECT * FROM events
        $event = Event::all();

        return view('events.events-list', [
            'events' => $event,
            'pageTitle' => $pageTitle
        ]);
    }


    // Display event details - This should fetch with information from the DB
    public function eventDetails($id){
        $pageTitle = 'Event Details';
        $event = Event::find($id);
        $adventure = $event->adventures;
        /*
        return view('events.event-details')->with(['event' => $event,
                                                   'adventure' => $adventure]); //The with takes the $event as an object
        */
        return view('events.event-details',['adventure' => $adventure,
                                            'event' => $event,
                                            'pageTitle' => $pageTitle]);
        }


    // This method redirect to create view
    public function create(){
        $pageTitle = 'Create a new event';
        // Gets the information of all trails to the form
        $trails = Trail::all(); 

        return view('events.events-create', ['trails' => $trails,
                                             'pageTitle' => $pageTitle]);
    }

    //this method stores the information on view on the DB
    public function store(request $request){
        
        $formFields = $request->validate([
            'eventTitle' => 'required',
            'trail' => 'required',
            'start_time' => 'required',
            'starting_date' => 'required',
            'due_date' => 'required',
            'end_time' => 'required',

        ]);


        $event = Event::create([
            
            'title' => $request->input('eventTitle'), //eventTitle is the name atr from input on create page
            'organizer_id'=> 1 //value 1 defined just to the store method work - this value needs to be changed after
        ]);

        //get date + hour and put it together
        $startDate = $request->input('starting_date') . ' ' . $request->input('start_time');
        $startDate = new DateTime($startDate);

        $dueDate = $request->input('due_date') . ' ' . $request->input('end_time');
        $dueDate = new DateTime($dueDate);

        $adventure = Adventure::create([
            'trail_id' => $request->input('trail'),
            'event_id' => $event->id,
            'start_date' => $startDate,
            'due_date' => $dueDate
        ]);
        return redirect('/events');
    }

    //method to edit event - for now just the title.
    public function edit($id){
       
        $pageTitle = 'Edit page';
        $trails = Trail::all();
        $event = Event::find($id); //Eloquent to connect to DB and find specific event by the id
        
        //This acces the value of specific trail, in this case, index 0
     

        return view('events.events-edit')->with(['event' => $event,
                                                'trails' => $trails,
                                                'pageTitle'=>$pageTitle,
                                                ]);
    }

    //Update event information on DB - For now just id and id_organizer.
    //Needs to learn how to connect databases to change foreign keys.
    public function update(Request $request, $id){
        //validation
        // dd($request);
        $validation = [
            'eventTitle' => 'required',
        ];
        
        foreach (Event::find($id)->adventures as $key => $adventure) {
            $index = $adventure->id;
            $validation['trail_E' . $index] = 'required';
            $validation['starting_date_E' . $index] = 'required';
            $validation['start_time_E' . $index] = 'required'; 
            $validation['due_date_E' . $index] = 'required'; 
            $validation['end_time_E' . $index] = 'required'; 
        }

        $formFields = $request->validate($validation);

        $event = Event::find($id)
            ->update([
                'title' => $request->input('eventTitle'), //eventTitle is the name atr from input on create page
                'organizer_id'=> 1 //value 1 defined just to the store method work - this value needs to be changed after
        ]);

        foreach (Event::find($id)->adventures as $key => $adventure) {
            $index = $adventure->id;
            //get date + hour and put it together
            $startDate = $request->input('starting_date_E' . $index) . ' ' . $request->input('start_time_E' . $index);
            $startDate = new DateTime($startDate);
 
            $dueDate = $request->input('due_date_E' . $index) . ' ' . $request->input('end_time_E' . $index);
            
            $dueDate = new DateTime($dueDate);
            $adventure->update([
                'trail_id' => $request->input('trail_E' . $index),
                'start_date' => $startDate,
                'due_date' => $dueDate
        ]);
    }
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
    public function getTrail($id, $trailId){

        $pageTitle = 'Trail Details';
        $event = Event::find($id);
        //specific event with eloquent
        //this gets the information of Event(model)->adventures.
        //dont forgoert that for access the information of trails after
        //it will be necessary a loop
        $adventures = $event->adventures;
        return view('trails.trail-details', ['pageTitle' => $pageTitle,
                                             'event' => $event,
                                            'adventures' => $adventures,
                                            'trialId' => $trailId]);
    }
}
