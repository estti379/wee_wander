<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Event;
use App\Models\Trail;
use App\Models\Adventure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    //This method select all events from the DB
    public function eventsCard(){
        $pageTitle = 'Events Lista Page';
        //Select the Events. Paginate is for pagination.
        $event = Event::paginate(4);
        return view('events.events-list', [
            'events' => $event,
            'pageTitle' => $pageTitle,
        ]);
    }


    // Display event details - This should fetch with information from the DB
    public function eventDetails($id){
        $pageTitle = 'Event Details';
        $event = Event::find($id);
        $adventure = $event->adventures;

        return view('events.event-details',['adventure' => $adventure,
                                            'event' => $event,
                                            'pageTitle' => $pageTitle]);
        }


    // This method redirect to create view
    public function create(){
        //Session check
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'You have to be logged in to create an event!');
        }

        $pageTitle = 'Create a new event';
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
            'organizer_id'=>Auth::id() //organizer_id will have the same id as the user that is logged in.
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

    //Method to edit event.
    public function edit($id){
       
        $pageTitle = 'Edit page';
        $trails = Trail::all();
        $event = Event::find($id);
        
        return view('events.events-edit')->with(['event' => $event,
                                                'trails' => $trails,
                                                'pageTitle'=>$pageTitle,
                                                ]);
    }

    //Update event information
    public function update(Request $request, $id){
        //validation
        $validation = [
            'eventTitle' => 'required',
        ];
        //Here we had the most insane bug ever.
        //commented this just to never forget the suffering.
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
                'title' => $request->input('eventTitle'),
                'organizer_id'=> 1 //value 1 defined just to the store method work - this value needs to be changed after
        ]);

        foreach (Event::find($id)->adventures as $key => $adventure) {
            $index = $adventure->id;
            //put date + time in a format that DB accepts.
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

    //METHOD NOT WORKING PROPERLY -- NEEDS TO FIX
    //Delete event of the DB
    public function destroy($id) {
        $event = Event::find($id);

        if($event){
            $event->delete();
        }
        return redirect('/events');
    }



    public function getTrail($id, $trailId){

        $pageTitle = 'Trail Details';
        $event = Event::find($id);
        $adventures = $event->adventures;
        return view('trails.trail-details', ['pageTitle' => $pageTitle,
                                             'event' => $event,
                                            'adventures' => $adventures,
                                            'trialId' => $trailId]);
    }
    
}
