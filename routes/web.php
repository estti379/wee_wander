<?php

use App\Models\Route as Carpool;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

// Route for list all events
Route::get('/events', [EventsController::class, 'eventsCard']);

// route for specific event
Route::get('/events/{id}', [EventsController::class, 'eventDetails']);

//Route for Create Event
Route::get('/create-event', [EventsController::class, 'create']);

// route for specific trail information
Route::get('/events/{id}/trail', [EventsController::class, 'getTrail']);

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
