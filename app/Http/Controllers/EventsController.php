<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\User;
use App\Models\Event;
use App\Models\Trail;
use App\Models\Adventure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class EventsController extends Controller
{
    //This method select all events from the DB
    public function eventsCard(Request $request){
        $pageTitle = 'WeeWander - Events List Page';

        //querry builder
        $query = Event::query();
        //show only events where given user is organizer
        if ($request->has('organizer')) {
            $query->where('organizer_id', $request->input('organizer'));
        }

        //By default, show only events in the future, unless old = true
        if (!$request->has('old') || ($request->has('old') && $request->input('old') != "true") ) {
            if (!$request->has('empty') || ($request->has('empty') && $request->input('empty') != "true") ) {
                $query->whereHas('adventures', function (Builder $query) {
                        $query->where('start_date', '>', new DateTime("now"));
                });
            } else {
                $query->wheredoesnthave('adventures')
                    ->orwhereHas('adventures', function (Builder $query) {
                        $query->where('start_date', '>', new DateTime("now"));
                    });
            }
            
        }

        //show only events where given user participates in at least one adventure
        if ($request->has('participant')) {
            $trekkerId = $request->input('participant');
            $query->whereHas('adventures', function (Builder $query) use ($trekkerId) {
                $query->whereHas('participants', function (Builder $query) use ($trekkerId) {
                    $query->where("id", $trekkerId);
                });
            });
        }

        //By default, show only events with at least one adventure , unless empty = true
        if (!$request->has('empty') || ($request->has('empty') && $request->input('empty') != "true") ) {
            $query->whereHas('adventures'); 
        }

        //show only events happening in the future
        if ($request->has('upcoming') && $request->input('upcoming') == "true") {
            $query->whereHas('adventures', function (Builder $query) {
                $query->where('start_date', '>', new DateTime("now"));
            });
        }
        
        //Select the Events. Paginate is for pagination.
        $events = $query->paginate(4);
        

        return view('events.events-list', [
            'events' => $events,
            'pageTitle' => $pageTitle,
        ]);
    }


    // Display event details - This should fetch with information from the DB
    public function eventDetails($id){
        $event = Event::find($id);
        $pageTitle = 'WeeWander - '. $event->title . ' Event';
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

        $pageTitle = 'WeeWander - Create a new event';
        $trails = Trail::all(); 

        return view('events.events-create', ['trails' => $trails,
                                             'pageTitle' => $pageTitle]);
    }

    //this method stores the information on view on the DB
    public function store(request $request){
        $validation = [
            'eventTitle' => 'required'
        ];

        $done = false;
        $i = 0;

        while(!$done){
            if( $request->has("trail__".($i+1))  ){
                $i++;
                $validation["trail__" . $i] = 'required';
                $validation["start_time__" . $i] = "required";
                $validation["starting_date__" . $i] = "required";
                $validation["due_date__" . $i] = "required";
                $validation["end_time__" . $i] = "required";
            } else {
                $done = true;
            }
        }
        //dd($validation);
        session(['nbNewTrails' => $i]);
        $formFields = $request->validate($validation);
        session()->pull('nbNewTrails', 'default');

        $event = Event::create([
            'title' => $formFields['eventTitle'], //eventTitle is the name atr from input on create page
            'organizer_id'=>Auth::id() //organizer_id will have the same id as the user that is logged in.
        ]);


        
        for ($j=1; $j <= $i; $j++) {
            //get date + hour and put it together
            $startDate = $formFields['starting_date__'.$j] . ' ' . $formFields['start_time__'.$j];
            $startDate = new DateTime($startDate);

            $dueDate = $formFields['due_date__'.$j] . ' ' . $formFields['end_time__'.$j];
            $dueDate = new DateTime($dueDate);
            if($startDate < $dueDate){
                $dueDate = clone $startDate;
            }

            Adventure::create([
                'trail_id' => $formFields['trail__'.$j],
                'event_id' => $event->id,
                'start_date' => $startDate,
                'due_date' => $dueDate
            ]);
        }
        
        return redirect('/events');
    }

    //Method to edit event.
    public function edit($id){
       
        $trails = Trail::all();
        $event = Event::find($id);
        $pageTitle = 'WeeWander - '. $event->title . ' Edit';
        
        
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

        $done = false;
        $i = 0;

        while(!$done){
            if( $request->has("trail__".($i+1))  ){
                $i++;
                $validation["trail__" . $i] = 'required';
                $validation["start_time__" . $i] = "required";
                $validation["starting_date__" . $i] = "required";
                $validation["due_date__" . $i] = "required";
                $validation["end_time__" . $i] = "required";
            } else {
                $done = true;
            }
        }
        
        session(['nbNewTrails' => $i]);
        $formFields = $request->validate($validation);
        session()->pull('nbNewTrails', 'default');

        $event = Event::find($id);
        
        $event->update([
                'title' => $formFields['eventTitle'],
        ]);

        foreach ($event->adventures as $adventure) {
            $index = $adventure->id;
            //put date + time in a format that DB accepts.
            $startDate = $formFields['starting_date_E' . $index] . ' ' . $formFields['start_time_E' . $index];
            $startDate = new DateTime($startDate);
            $dueDate = $formFields['due_date_E' . $index] . ' ' . $formFields['end_time_E' . $index];
            $dueDate = new DateTime($dueDate);
            if($startDate < $dueDate){
                $dueDate = clone $startDate;
            }


            $adventure->update([
                'trail_id' => $formFields['trail_E' . $index],
                'start_date' => $startDate,
                'due_date' => $dueDate
            ]);
        }
         
        for ($j=1; $j <= $i; $j++) {
            //get date + hour and put it together
            $startDate = $formFields['starting_date__'.$j] . ' ' . $formFields['start_time__'.$j];
            $startDate = new DateTime($startDate);

            $dueDate = $formFields['due_date__'.$j] . ' ' . $formFields['end_time__'.$j];
            $dueDate = new DateTime($dueDate);
            if($startDate < $dueDate){
                $dueDate = clone $startDate;
            }


            Adventure::create([
                'trail_id' => $formFields['trail__'.$j],
                'event_id' => $event->id,
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


    // Join an adventure as a participant
    public function joinAdventure($id)
{
    if (!Auth::check()) {
        return redirect('/login')->with('message', 'You have to be logged in to join an Adventure!');
    }

    $adventure = Adventure::find($id);
    $user = Auth::user();
    
    $alreadyJoined = $adventure->participants->where("id", $user->id)->count() > 0;

    // Check if the user is already associated with the adventure
    if($alreadyJoined){
        return redirect()->back()->with('message', 'You are already part of this Adventure!');
    } else {
        // Associate the user with the adventure
        $adventure->participants()->attach($user);
    }
    $adventure->save();

    return redirect("/events/".$adventure->event->id)->with('message', 'You have successfully joined the Adventure!');
}


//====================================================================================================================================

    // Withdraw from an Adventure
    public function withdrawAdventure($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'You have to be logged in to withdraw from a Adventure!');
        }
        
        $adventure = Adventure::find($id);
        $user = Auth::user();
        
        $alreadyJoined = $adventure->participants->where("id", $user->id)->count() > 0;

        // Check if the user is already associated with the carpool
        if( !$alreadyJoined ){
            return redirect()->back()->with('message', 'You cannot withdraw from a Adventure you are not part off!!');
        } else {
            // Disassociate the user with the carpool
            $adventure->participants()->detach($user);
        }

        $adventure->save();
        
        return redirect("/events/".$adventure->event->id)->with('message', 'You have successfully withdraw from the Adventure!');
    }


    //====================================================================================================================================

    // Withdraw from an Adventure
    public function listAdventureParticipants($id)
    {
        $adventure = Adventure::find($id);
        $pageTitle = 'WeeWander - Adventure participants';
        $participants = User::whereHas('participatingInAdventures',  function($query) use ($id){
                $query->where('adventure_id', $id);
            })
            ->get();
        return view('events.adventureParticipants', [
            'adventure' => $adventure,
            'pageTitle' => $pageTitle,
            'participants' => $participants,
        ]);
    }

    
}
