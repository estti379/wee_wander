<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Adventure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

    // Create Form View
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'You have to be logged in to create a Carpool!');
        }
        $adventures = Adventure::all();
        return view('carpool.create', ['adventures'=> $adventures,'pageTitle'=>'WeeWander carpool-create']);
    }
    // Edit Form
    public function edit($id)
    {
        $shareRoadDetails = Route::find($id);
    // Pass the share road details to the view
        return view('carpool.edit', ['element' => $shareRoadDetails,'pageTitle'=>'WeeWander - edit']);
    }
   /* public function update(){
        $carpoolUpdate = new Route();
        $carpoolUpdate->carowner_id=1;                     // TO DO ADD Value request('id_carowner');
        $carpoolUpdate->start_location_long=50;            // request('city');
        $carpoolUpdate->start_location_latit=49;            // request('city');
        $carpoolUpdate->end_location_long=50;                   //request('end_location_long');
        $carpoolUpdate->end_location_latit=51;  
        //==============================================================================================
        $carpoolUpdate->start_adventure_id=1;  //{{ $adventure->start_date }}                     
        $carpoolUpdate->end_adventure_id=1;  //{{ $adventure->end_date }}
        $carpoolUpdate->distance=request('distance');       
        $carpoolUpdate->start_date=request('start_date').' '.request('time');
        //$dateTimeString = request('start_date').' '.request('time');
        // $carpoolForm->start_date=DateTime::createFromFormat('d/m/Y, H:i', $dateTimeString);
        $carpoolUpdate->max_seats=request('max_seats');
        $carpoolUpdate->bike_capacity=request('bike_capacity');
        $carpoolUpdate->pets_allowed = request('pets_allowed') ? 1 : 0;
        $carpoolUpdate->luggage = request('luggage') ? 1 : 0;
        $carpoolUpdate->smokers_allowed = request('smokers_allowed') ? 1 : 0;
        $carpoolUpdate->price=request('price');
        
        // Save the data to de DB
        $carpoolUpdate->save();
        return redirect('/')->with('Carpool created successfully');
        // <strong style="color:green;"><p class="message">{{session('message')}}</p></strong>
    }*/

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

} // end of the class
