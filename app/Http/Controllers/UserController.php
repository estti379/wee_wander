<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show Login Form
    public function login() {
        if( Auth::check() ){
            //An user is already logged in
            return redirect('/')->with('message', 'You are already logged in!');
        }
        return view('users.login', ["pageTitle"=> "WeeWander - Sign In"]);
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'userName' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            //TODO: redirect to better page!
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['userName' => 'Invalid Credentials'])->onlyInput('userName');
    }

    // Logout User
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // Show user detail page
    public function show($id) {
        $userDetails = User::find($id);

        $isOwner = $this->checkIfPageOwner($id);
        $pageOwnerName = $userDetails->firstname." ".$userDetails->lastname;
        return view('users.show', [
            "userDetails" => $userDetails,
            "isOwner" => $isOwner,
            "pageTitle"=> "WeeWander - ".$pageOwnerName." page",
        ]);
    }

    // Show user detail page
    public function profile() {
        if( !Auth::check() ){
            return redirect('/login')->with('message', 'You have to be logged in to access this page!');
        }

        $userDetails = Auth::user();

        $pageOwnerName = $userDetails->firstname." ".$userDetails->lastname;
        return view('users.show', [
            "userDetails" => $userDetails,
            "isOwner" => true,
            "pageTitle"=> "WeeWander - ".$pageOwnerName." page",
        ]);
    }

    // Show Register/Create Form
    public function create() {
        return view('users.register', ["pageTitle"=> "WeeWander - Register"]);
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'username' => ['required', 'min:5', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'firstname' => ['required', 'min:2'],
            'lastname' => ['required', 'min:2'],
            'password' => ['required','confirmed','min:6'],
        ]);

        // Hash Password
        $formFields['password'] = password_hash($formFields['password'],  PASSWORD_DEFAULT);

        //Populate mising columns
        $randomImageUrl = fake()->imageUrl(200, 200, $formFields['firstname']." ".$formFields['lastname']);
        $URLsnippets = explode("+", $randomImageUrl);
        $formFields['picture'] = $URLsnippets[0]."+".$URLsnippets[1];
        $formFields['description'] = "";
        $formFields['car_owned'] = "hidden";
        $formFields['driver_license'] = "hidden";

        // Create User
        $user = User::create($formFields);

        // Login
        Auth::login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Update User Image
    public function updateImage(Request $request){
        if(!Auth::check()){
            return redirect('/login')->with('message', 'You need to be logged in to have access to this page!');
        }

        $formFields = $request->validate([
            'picture' => 'required',
        ]);

        $user = USER::find(Auth::user()->id);
        $user->update($formFields);

        return redirect('/profile');

    }

    // Update User first and last Name
    public function updateName(Request $request){
        if(!Auth::check()){
            return redirect('/login')->with('message', 'You need to be logged in to have access to this page!');
        }

        $formFields = $request->validate([
            'firstname' => ['required', 'min:2'],
            'lastname' => ['required', 'min:2'],
        ]);

        $user = USER::find(Auth::user()->id);
        $user->update($formFields);

        return redirect('/profile');

    }

    // Update User sensitive information
    public function updateSensitive(Request $request){
    if(!Auth::check()){
        return redirect('/login')->with('message', 'You need to be logged in to have access to this page!');
    }

    $user = USER::find(Auth::user()->id);

    $formFields = $request->validate([
        'username' => ['required', 'min:5', Rule::unique('users', 'username')->ignore($user->id, 'id')],
        'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id, 'id')],
        'password' => ['required','confirmed','min:6'],

    ]);

    
    $user->update($formFields);

    return redirect('/profile');

    }

    // Update User Bio
    public function updateBio(Request $request){
    if(!Auth::check()){
        return redirect('/login')->with('message', 'You need to be logged in to have access to this page!');
    }

    $user = USER::find(Auth::user()->id);
    $user->update([ "description" => $request["description"] ]);

    return redirect('/profile');

    }

    // Update User Details
    public function updateDetails(Request $request){
    if(!Auth::check()){
        return redirect('/login')->with('message', 'You need to be logged in to have access to this page!');
    }

    $user = USER::find(Auth::user()->id);
    $user->update([
        "car_owned" => $request["car_owned"],
        "driver_license" => $request["driver_license"],
    ]);

    return redirect('/profile');

    }





    /**
     * Helper functions!
     */

     private function checkIfPageOwner($id):bool {
        if( !Auth::check() ){
            //No user is logged in
            $isOwner = false;
        } else{
            //an user is logged in
            if(Auth::user()->id != $id){
                $isOwner = false;
            } else {
                $isOwner = true;
            }
        }

        return $isOwner;
     }
}
