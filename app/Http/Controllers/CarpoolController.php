<?php

namespace App\Http\Controllers;

use App\Models\Route;
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
        return view('carpool.create');
    }


    public function store(){
        $carpoolForm = new Route();
        
        $carpoolForm->username=request('username');
        $carpoolForm->start_location=request('city');
        $carpoolForm->end_location=request('end_location');
        $carpoolForm->date=request('start_date');
        $carpoolForm->vmax_seats=request('max_seats');
        $carpoolForm->bike_capacity=request('bike_capacity');
        $carpoolForm->time=request('time');
        $carpoolForm->pets_allowed=request('pets_allowed');
        $carpoolForm->luggage=request('luggage');
        $carpoolForm->smokers_allowed=request('smokers_allowed');
        $carpoolForm->price=request('price');

       $carpoolForm->save();
        return redirect('/')->with('message', 'Carpool created successfully');
    }

    //Store Listing Data
   /* public function store(Request $request)
    {
        //dd($request->all());

        $formFields = $request->validate([
            'username' => 'required',
            'location' => 'required',
            'adventure' => ['required', Rule::unique('carpool', 'adventure')],
            'seats' => 'required',
            'date' => ['required', 'date'],
            'time' => ['required', 'time'],
            'luggage' => 'required',
            'dog' => '',
            'smokers' =>'',
            'price' => 'required',
        ]);
        //now, if one of those field failed, it will show an error
        // if good completed we will redirect it to the hompage

        Route::create($formFields);
        return redirect('/')->with('message', 'Carpool created successfully');
    }*/
} // end of the class
