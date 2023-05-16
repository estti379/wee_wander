<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

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
    