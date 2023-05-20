<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Route;
use App\Models\Adventure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarpoolController extends Controller

{
    //Get and Show all carpool
    public function index()
    {
        $shareRoadDetails=Route::all();

        return view('carpool.lists', ['shareRoadDetails'=>$shareRoadDetails,'pageTitle'=>'WeeWander carpool-list']);
    }
    
     //Show single carpool
    public function show($id)
     {        
        $shareroad_card=Route ::find($id); 
        return view('carpool.single-road', ['carpool'=>$shareroad_card,'pageTitle'=>'WeeWander carpool-list']);
     }

     // Retrieve JSON FILE
     public function retrieveJson()
     {
         $jsonData = Storage::disk('public')->get('storage/app/public/lu.json');
         $data = json_decode($jsonData, true);
         return $data;
     }


    // Create Form View
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'You have to be logged in to create a Carpool!');
        }
        $data = $this->retrieveJson();
        $adventures = Adventure::all();
        return view('carpool.create', ['adventures' => $adventures,'data' => $data,'pageTitle' => 'WeeWander carpool-create']);
    }

    // Edit Form
    public function edit($id)
    {
        if (!Auth::check()) {
        return redirect('/login')->with('message', 'You have to be logged in to edit the Carpool!');
    }
        $shareRoadDetails = Route::find($id);
    // Pass the share road details to the view
        return view('carpool.edit', ['element' => $shareRoadDetails,'pageTitle'=>'WeeWander - edit']);
    }

    public function store(){
        $carpoolForm = new Route();

        $carpoolForm->carowner_id=Auth::user()->id;                     // TO DO ADD Value request('id_carowner');
        $carpoolForm->start_location_long=50;            // request('city');
        $carpoolForm->start_location_latit=49;            // request('city');
        $carpoolForm->end_location_long=50;                   //request('end_location_long');
        $carpoolForm->end_location_latit=51;  
        //==============================================================================================
        $carpoolForm->start_adventure_id=1;  //{{ $adventure->start_date }}                     
        $carpoolForm->end_adventure_id=1;  //{{ $adventure->end_date }}
        $carpoolForm->distance=request('distance');       
        $carpoolForm->start_date=request('start_date').' '.request('time');
        //$dateTimeString = request('start_date').' '.request('time');
        // $carpoolForm->start_date=DateTime::createFromFormat('d/m/Y, H:i', $dateTimeString);
        $carpoolForm->max_seats=request('max_seats');
        $carpoolForm->bike_capacity=request('bike_capacity');
        $carpoolForm->pets_allowed = request('pets_allowed') ? 1 : 0;
        $carpoolForm->luggage = request('luggage') ? 1 : 0;
        $carpoolForm->smokers_allowed = request('smokers_allowed') ? 1 : 0;
        $carpoolForm->price=request('price');
        
        // Save the data to de DB
        $carpoolForm->save();
        return redirect('/')->with('Carpool created successfully');
        // <strong style="color:green;"><p class="message">{{session('message')}}</p></strong>
    }

        // Update Form
        public function update(Request $request,$id){
            $carpoolUpdate =Route::find($id);
            $carpoolUpdate->start_location_long=$request->input('start_location_long');            // request('city');
            $carpoolUpdate->start_location_latit=$request->input('start_location_latit');
            $carpoolUpdate->end_location_long=$request->input('end_location_long');
            $carpoolUpdate->end_location_latit=$request->input('end_location_latit');
            $carpoolUpdate->start_adventure_id=1;  //{{ $adventure->start_date }}                     
            $carpoolUpdate->end_adventure_id=1;  //{{ $adventure->end_date }}
            $carpoolUpdate->distance=$request->input('distance');       
            $carpoolUpdate->start_date=$request->input('start_date');//.' '.request('time');
            $carpoolUpdate->max_seats=$request->input('max_seats');
            $carpoolUpdate->bike_capacity=$request->input('bike_capacity');
            $carpoolUpdate->pets_allowed=$request->input('pets_allowed') ? 1 : 0;
            $carpoolUpdate->luggage=$request->input('luggage') ? 1 : 0;
            $carpoolUpdate->smokers_allowed=$request->input('smokers_allowed') ? 1 : 0;
            $carpoolUpdate->price=$request->input('price');
            
            // Save the data to de DB
            $carpoolUpdate->save();
            return redirect('/carpool')->with('Carpool edited successfully');
            // <strong style="color:green;"><p class="message">{{session('message')}}</p></strong>
        }

        public function joinCarpool($id)
        {
            if (!Auth::check()) {
                return redirect('/login')->with('message', 'You have to be logged in to join a Carpool!');
            }
        
            $carpool = Route::find($id);
            $user = Auth::user();
        
            // Associate the user with the carpool
            $carpool->participants()->attach($user);
        
            // Update the max_seat count for the joined user
            $carpool->max_seat = $user->max_seat -1;
            $carpool->save();
        
            return redirect("/carpool/".$id)->with('message', 'You have successfully joined the Carpool!');
        }


    
} // end of the class
//// Join Carpool
/*public function join($id)
{
    if (!Auth::check()) {
        return redirect('/login')->with('message', 'You have to be logged in to join a Carpool!');
    }
    
    $carpool = Route::find($id);
    
    if ($carpool->available_seats <= 0) {
        return redirect('/')->with('message', 'No available seats in the Carpool');
    }
    
    $carpool->participants()->attach(Auth::user()->id);
    $carpool->available_seats -= 1;
    $carpool->save();
    
    return redirect('/')->with('message', 'You have joined the Carpool successfully');
}
}*/