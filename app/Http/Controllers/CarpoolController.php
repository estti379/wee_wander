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
        $shareroadDetails=Route::all();
        return view ('carpool.lists',[
            'shareroaddetails'=>$shareroadDetails
        ]);
       
    }
     //Show single carpool
     public function show(Route $shareroad_card)
     {
         return view('carpool.show', [
             'carpool'=>$shareroad_card
         ]);
     }

    // Create Form View
    public function create()
    {
        $adventures = Adventure::all();
        return view('carpool.create',['adventures' => $adventures]);
    }



    public function store(){
        $carpoolForm = new Route();
        
        $carpoolForm->id_carowner=1;                     // TO DO ADD Value request('id_carowner');
        $carpoolForm->start_location_long=50;            // request('city');
        $carpoolForm->start_location_latit=49;            // request('city');
        $carpoolForm->distance=request('distance');
        $carpoolForm->end_location_long=request('end_location_long');
        $carpoolForm->end_location_latit=51;
        $carpoolForm->start_date=request('start_date').' '.request('time');

        //$dateTimeString = request('start_date').' '.request('time');
        // $carpoolForm->start_date=DateTime::createFromFormat('d/m/Y, H:i', $dateTimeString);

        $carpoolForm->max_seats=request('max_seats');
        $carpoolForm->bike_capacity=request('bike_capacity');
        $carpoolForm->pets_allowed=request('pets_allowed');
        $carpoolForm->luggage=request('luggage');
        $carpoolForm->smokers_allowed=request('smokers_allowed');
        $carpoolForm->price=request('price');
        // error_log($carpoolForm);
       $carpoolForm->save();
        return redirect('/')->with('message', 'Carpool created successfully');
    }

} // end of the class
