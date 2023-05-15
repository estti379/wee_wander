# 14/04/2023 - Domingo.

## Doing the weather API fetch - https://open-meteo.com

_1_ -> Route created to the weather API.

**Route for the weatherAPI -> web.php**

Route::get('/weather', [WeatherController::class, 'getWeather']);

_2_ -> controler created for get the weather

**php artisan make:controller WeatherController**

_3_ -> do the method to fetch the info. The method is inside the WeatherController.

```php
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
```

This is fetching a JSON with some informations inside.
Then, returning a view weather.weatherDisplay to show the informations of .

_4-_ -> Doing some display tests.

```php
  @for ($i = 0; $i < 6; $i++)
    <p> {{ $weatherData['hourly']['time'][$i] }} - Temperature {{ $weatherData['hourly']['temperature_2m'][$i] }} degrees </p>
  @endfor

  /*
SOME TEST TO KNOW HOW TO ACCESS THE INFORMATION INSIDE RETURN OF WeatherController.php.

  echo $weatherData['latitude'];
  echo $weatherData['longitude'];
  echo $weatherData['hourly_units']['time'];
  echo $weatherData['hourly_units']['temperature_2m'];
  echo $weatherData['hourly']['time'];
  echo $weatherData['hourly']['time'][0] . ' - ' . $weatherData['hourly']['temperature_2m'][0];

*/

```

=====================================================================================
