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
    return view('welcome');
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


/*
 * START: User Management
 */

//User login page
Route::get('/login', [UserController::class, 'login']);

 //User authentication
 Route::post('/users/authenticate', [UserController::class, 'authenticate']);

/*
 * END: User Management
 */

//=============================================================
// Route Show all carpool
Route::get('/carpool',[CarpoolController::class, 'index']);


//=============================================================
// Create new CarPool 
Route::get('/carpool/create',[CarpoolController::class, 'create']);

//=============================================================
// Store CarPool 
Route::post('/carpool', [CarpoolController::class, 'store']);

//=============================================================

//=============================================================
// Route Show single carpool
//Route::get('/carpool',[CarpoolController::class, 'index']);
Route::get('/carpool/{id}', function ($id) {
    return view('carpool', [ 
        'carpool'=>Carpool::find($id)
    ]);
});
