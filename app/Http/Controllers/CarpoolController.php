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
        return view ('carpool',[
            'shareroaddetails'=>$shareroadDetails
        ]);
       
    }
     //Show single carpool
     public function show(Route $shareroad_card)
     {
         return view('carpool.show', [
             'carpool' => $shareroad_card
         ]);
     }

    // Create Form View
    public function create()
    {
        return view('carpool.create');
    }

    //Store Listing Data
    public function store(Request $request)
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
    }
} // end of the class
