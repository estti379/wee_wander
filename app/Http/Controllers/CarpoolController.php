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

    // Show single road detail
     public function show($id)
    {
    $carpool = Route::find($id);
    return view('carpool.singleroad', ['carpool' => $carpool,'pageTitle'=>'WeeWander carpool-detail']);
    }
/*====================================================================*/
    //This method select all events from the DB
    /*public function carpoolCard(){
       // $pageTitle = 'carpool-list ';
        //Select the Events. Paginate is for pagination.
        $carpoolPages= Route::all();
        dd($carpoolPages);
        return view('carpool.lists', ['carpool' => $carpoolPages]);
    }*/
/*====================================================================*/
     // Retrieve JSON FILE
     public function retrieveJson()
     {
         $jsonData = Storage::disk('public')->get('storage/app/public/lu.json');
         $data = json_decode($jsonData, true);
         if (is_object($data)) {
            $data = [$data];
         return $data;


         /*$jsonData = \App\Models\JsonData::all();

        // Loop through the data and access the 'data' attribute
        foreach ($jsonData as $item) {
        $dataArray = $item->data;
        // Access the JSON data as an associative array
        }   
            */
     }
    }
//====================================================================================================================================
     // Create Form View
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'You have to be logged in to create a Carpool!');
        }
        //$data = $this->retrieveJson();
        $adventures = Adventure::all();
        return view('carpool.create', ['adventures' => $adventures,'pageTitle' => 'WeeWander carpool-create']); //'data' => $data
    }

//====================================================================================================================================
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
    //====================================================================================================================================
    // Store Form
    public function store(Request $request){
        
        $formFields = $request->validate([
            'start_location_long' => 'required',
            'end_location_long' => 'required',
            'bike_capacity' => 'required',
            'pets_allowed' => 'required',
            'luggage' => 'required',
            'smokers_allowed' => 'required',
            'price' => 'required'
        ]);


        $carpoolForm = new Route();

        $carpoolForm->carowner_id=Auth::user()->id;       // TO DO ADD Value request('id_carowner');
        $carpoolForm->start_location_long=request('start_location_long');            // request('city');
        $carpoolForm->start_location_latit=request('start_location_latit');            // request('city');
        $carpoolForm->end_location_long=request('end_location_long');                   //request('end_location_long');
        $carpoolForm->end_location_latit=request('end_location_latit');  
        $carpoolForm->start_adventure_id=1;  //{{ $adventure->start_date }}                     
        $carpoolForm->end_adventure_id=1;  //{{ $adventure->end_date }}
        $carpoolForm->distance= 1;        // BONUS FEATURE  request('distance'); 
        $carpoolForm->start_date=request('start_date').' '.request('time');
        $carpoolForm->max_seats=request('max_seats');
        $carpoolForm->bike_capacity=request('bike_capacity') ? 1 : 0;
        $carpoolForm->pets_allowed = request('pets_allowed') ? 1 : 0;
        $carpoolForm->luggage = request('luggage') ? 1 : 0;
        $carpoolForm->smokers_allowed = request('smokers_allowed') ? 1 : 0;
        $carpoolForm->price=request('price');
        
        // Save the data to de DB
        $carpoolForm->save();
        return redirect('/')->with('message','Carpool created successfully');
        // <strong style="color:green;"><p class="message">{{session('message')}}</p></strong>
    }

    //====================================================================================================================================
        // Update Form
        public function update(Request $request,$id){
            $carpoolUpdate =Route::find($id);
            $carpoolUpdate->start_location_long=$request->input('start_location_long');            // request('city');
            $carpoolUpdate->start_location_latit=$request->input('start_location_latit');
            $carpoolUpdate->end_location_long=$request->input('end_location_long');
            $carpoolUpdate->end_location_latit=$request->input('end_location_latit');
            $carpoolUpdate->start_adventure_id=1;  //{{ $adventure->start_date }}                     
            $carpoolUpdate->end_adventure_id=1;  //{{ $adventure->end_date }}
            $carpoolUpdate->distance=1;   // BONUS FEATURE $request->input('distance');       
            $carpoolUpdate->start_date=$request->input('start_date');//.' '.request('time');
            $carpoolUpdate->max_seats=$request->input('max_seats');
            $carpoolUpdate->bike_capacity=$request->input('bike_capacity');
            $carpoolUpdate->pets_allowed=$request->input('pets_allowed') ? 1 : 0;
            $carpoolUpdate->luggage=$request->input('luggage') ? 1 : 0;
            $carpoolUpdate->smokers_allowed=$request->input('smokers_allowed') ? 1 : 0;
            $carpoolUpdate->price=$request->input('price');
            
            // Save the data to de DB
            $carpoolUpdate->save();
            return redirect('/carpool')->with('message','Carpool edited successfully');
            // <strong style="color:green;"><p class="message">{{session('message')}}</p></strong>
        }
//====================================================================================================================================

public function joinCarpool($id)
{
    if (!Auth::check()) {
        return redirect('/login')->with('message', 'You have to be logged in to join a Carpool!');
    }

    $carpool = Route::find($id);
    $user = Auth::user();
    
    // Check if the user is already associated with the carpool
    if (!$carpool->participants()->where('participant_id', $user->id)->exists()) {
        // Associate the user with the carpool
        $carpool->participants()->attach($user);
    }
    
    // Update the max_seat count for the joined user
    $carpool->save();

    return redirect("/carpool/".$id)->with('message', 'You have successfully joined the Carpool!');
}


//====================================================================================================================================

    
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