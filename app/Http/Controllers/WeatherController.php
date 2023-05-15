<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //method weather API
    //Fetch infos with openweather
    public function getWeather()
    {
        $url = "https://api.open-meteo.com/v1/forecast?latitude=-23.55&longitude=-46.64&hourly=temperature_2m";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $weatherData = json_decode($response, true);
        //$prettyJson = json_encode($weatherData, JSON_PRETTY_PRINT);
        //return response($prettyJson)->header('Content-Type', 'application/json');
        
        return view('weather.weatherDisplay', 
                [
                    'weatherData' => $weatherData
                ]);
        
    }
}
