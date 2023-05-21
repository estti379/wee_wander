<?php

namespace App\Http\Controllers;

use App\Models\Trail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrailController extends Controller
{
    // method redirects to create page
    public function create(){
        //Session check
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'You have to be logged in to create an event!');
        }
        $pageTitle = 'Create a new trail';

        return view('trails.create-trail', ['pageTitle' => $pageTitle]);
    }

    // method to store trail informations in the db
    public function store(Request $request){

        // Create a new trail instance
        $trail = Trail::create([
            'name' =>  $request->input('trailName'),
            'distance' =>$request->input('trailDistance'),
            'location_long' => $request->input('location_long'),
            'location_latit' => $request->input('location_latit')
        ]);
        // Redirect to a success page or perform any other necessary actions
        return redirect('/events');
        }

}
