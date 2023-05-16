<?php

namespace App\Http\Controllers;

use App\Models\Carpool;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarpoolController extends Controller
{
    //Get and Show all listings
    public function index()
    {
        return view('carpool.index', [
            'carpool' => Carpool::latest()->filter(request(['tag', 'search']))
                ->paginate(4),

        ]);
    }
    //Show single shareroad
    public function show(Carpool $shareroad_card)
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

        Carpool::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully');
    }
} // end of the class
