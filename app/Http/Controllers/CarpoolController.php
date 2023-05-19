<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Adventure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarpoolController extends Controller

{
    //Get and Show all carpool
    public function index()
    {
        $shareRoadDetails=Route::all();
        return view('carpool.lists', ['shareRoadDetails'=>$shareRoadDetails]);
    }
    
    

     //Show single carpool
     public function show(Route $shareroad_card)
     {
         return view('carpool.show', ['carpool'=>$shareroad_card]);
     }

    // Create Form View
    public function create()
    {
        $adventures = Adventure::all();
        return view('carpool.create', ['adventures'=> $adventures]);
    }
    // Edit Form
    public function edit($id)
    {
    $shareRoadDetails = Route::find($id);
    // Pass the share road details to the view
    return view('carpool.edit', ['element' => $shareRoadDetails]);
    }


    public function store(){
        $carpoolForm = new Route();

        $carpoolForm->carowner_id=1;                     // TO DO ADD Value request('id_carowner');
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
