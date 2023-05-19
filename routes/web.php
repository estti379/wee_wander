<?php

use App\Models\Route as Carpool;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CarpoolController;
use App\Http\Controllers\UserController;

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
Route::get('/events/{id}/edit', [EventsController::class, 'edit']);

//Specific trail information
Route::get('/events/{id}/trail', [EventsController::class, 'getTrail']);

//Updating an event
Route::put('/events/{id}', [EventsController::class, 'update']);

//Deleting an event
Route::delete('/events/{id}', [EventsController::class, 'destroy']);

//=============================================================
//Testing implementation of map
Route::get('/testing', function(){
    return view('testing.testing');
});

/*
 * START: User Management
 */


//User login page
Route::get('/login', [UserController::class, 'login']);

//Log User Out
Route::match(["get","post"],'/logout', [UserController::class, 'logout']);

//User authentication logic
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//User details page
Route::get('/users/{id}', [UserController::class, 'show']);

/*
 * END: User Management
 */


//=============================================================
                    // ROUTES(CARPOOL) ROUTE
// Route Show all carpool
Route::get('/carpool',[CarpoolController::class, 'index']);

// Create new CarPool 
Route::get('/carpool/create',[CarpoolController::class, 'create']);

//Edit Carpool
Route::get('/carpool/edit/{id}', [CarpoolController::class, 'edit']);

//Updating an Carpool
Route::put('/carpool/{id}', [CarpoolController::class, 'update']);

// Store CarPool 
Route::post('/carpool', [CarpoolController::class, 'store']);

// Route Show single carpool
Route::get('/carpool/{id}',[CarpoolController::class, 'show']);


