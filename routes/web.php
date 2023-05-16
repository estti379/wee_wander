<?php

use Illuminate\Support\Facades\Route;

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

// CarPool 
Route::get('/carpool',function(){
    return view('carpool.create');
});
// CarPool List
//Route::get('/carpool/list',function(){
//   return view('carpool.list');
//});
Route::get('/carpool/list', function () {
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
        ]]
    ]);
});