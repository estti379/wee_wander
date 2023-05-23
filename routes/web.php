<?php

use App\Models\Route as Carpool;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrailController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CarpoolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//=============================================================
//EVENT MNGMT
Route::get('/', function () {
    return view('index', ["pageTitle"=>"WeeWander - Home"]);
});

//List all events
Route::get('/events', [EventsController::class, 'eventsCard']);

// Specific event
Route::get('/events/{id}', [EventsController::class, 'eventDetails']);

//Create Event
Route::get('/create-event', [EventsController::class, 'create']);

//Storing event
Route::post('/events', [EventsController::class, 'store']);

//Edit event
Route::get('/events/edit/{id}/', [EventsController::class, 'edit']);

//Updating an event
Route::put('/events/{id}', [EventsController::class, 'update']);

//Deleting an event
Route::delete('/events/{id}', [EventsController::class, 'destroy']);
//=============================================================
//TRAILS

//Specific trail information
Route::get('/trail/{trailId}', [TrailController::class, 'getTrail']);

// create trail
Route::get('/create-trail', [TrailController::class, 'create']);
// store trail
Route::post('/trails', [TrailController::class, 'store']);

//=============================================================
//Testing implementation of map
Route::get('/testing', function(){
    return view('testing.testing');
});

//=============================================================

/*
 * START: User Management
 */


//User login page
Route::get('/login', [UserController::class, 'login']);

//Log User Out
Route::match(["get","post"],'/logout', [UserController::class, 'logout']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

//User authentication logic
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//User update image
Route::put('/users/updateImage', [UserController::class, 'updateImage']);

//User update name
Route::put('/users/updateName', [UserController::class, 'updateName']);

//User update sensitive information
Route::put('/users/updateSensitive', [UserController::class, 'updateSensitive']);

//User update bio
Route::put('/users/updateBio', [UserController::class, 'updateBio']);

//User update details
Route::put('/users/updateDetails', [UserController::class, 'updateDetails']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

// Show logged in user profile
Route::get('/profile', [UserController::class, 'profile']);

//User details page
Route::get('/users/{id}', [UserController::class, 'show']);

/*
 * END: User Management
 */


//=============================================================
                    // ROUTES(CARPOOL) ROUTE
// Show all carpool
Route::get('/carpool', [CarpoolController::class, 'index']);

// Create new CarPool
Route::get('/carpool/create', [CarpoolController::class, 'create']);
Route::post('/carpool', [CarpoolController::class, 'store']);

// Edit Carpool
Route::get('/carpool/edit/{id}', [CarpoolController::class, 'edit']);
Route::put('/carpool/{id}', [CarpoolController::class, 'update']);

// Join the Carpool
Route::post('/carpool/join/{id}', [CarpoolController::class, 'joinCarpool']);

// Show single carpool
Route::get('/carpool/{id}', [CarpoolController::class, 'show']);


// Testing implementation of map
Route::get('/testing', function () {
    return view('testing.testing');
});
