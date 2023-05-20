<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WeatherApi extends Component
{   
    public $lat;
    public $long;
    
    /**
     * Create a new component instance.
     */
    public function __construct($lat, $long)
    {
        $this->lat = $lat;
        $this->long = $long;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
    $weatherData = $this->getWeather();
    
    return view('components.weather-api', ['weatherData' => $weatherData]);
    }


    // Get information from the weatherAPi and fetch
    // For now, from Sao Paulo location
    
    public function getWeather(){
        
        $url = "https://api.open-meteo.com/v1/forecast?latitude=" . $this->lat . "&longitude=" . $this->long . "&hourly=temperature_2m,precipitation_probability&daily=weathercode,temperature_2m_max,temperature_2m_min&current_weather=true&forecast_days=1&timezone=Europe%2FLondon";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $weatherData = json_decode($response, true);
        //$prettyJson = json_encode($weatherData, JSON_PRETTY_PRINT);
        //return response($prettyJson)->header('Content-Type', 'application/json');
        
        return $weatherData; 
    }
}
    



