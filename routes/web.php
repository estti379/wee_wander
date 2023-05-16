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
    
// CarPool 
Route::get('/carpool',function(){
    return view('carpool.create');
});

// Storer CarPool 
Route::post('/carpool/store', [CarpoolController::class, 'store']);

// CarPool List
Route::get('/carpool.list', function () {
    return view('carpool.list', [
        'users' => [[
            'username' => 'Momo',
            'location' => 'luxembourg',
            'adventure' => 'Mersch',
            'seats' => 1,
            'bike_rack' => 2,
            'date' => '26/05/2023',
            'time' => '15:00',
            'luggage' => 'yes',
            'dog' => 'yes',
            'smokers' => 'yes',
            'price' => '45€',
        ],
         [
            'username' => 'koko',
            'location' => 'luxembourg',
            'adventure' => 'Remich',
            'seats' => 1,
            'bike_rack' => 2,
            'date' => '26/05/2023',
            'time' => '15:00',
            'luggage' => 'yes',
            'dog' => 'yes',
            'smokers' => 'yes',
            'price' => '75€',
         ],
         [
            'username' => 'popo',
            'location' => 'Gasperich',
            'adventure' => 'Esch',
            'seats' => 1,
            'bike_rack' => 2,
            'date' => '26/05/2023',
            'time' => '15:00',
            'luggage' => 'yes',
            'dog' => 'yes',
            'smokers' => 'yes',
            'price' => '50€',
        ]]
    ]);
});

