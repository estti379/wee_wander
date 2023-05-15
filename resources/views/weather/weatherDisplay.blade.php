@php
/*
SOME TEST TO KNOW HOW TO ACCESS THE INFORMATION INSIDE RETURN OF WeatherController.php.

  echo $weatherData['latitude'];
  echo $weatherData['longitude'];
  echo $weatherData['hourly_units']['time'];
  echo $weatherData['hourly_units']['temperature_2m'];
  echo $weatherData['hourly']['time']; -- dont work
  echo $weatherData['hourly']['time'][0] . ' - ' . $weatherData['hourly']['temperature_2m'][0];

*/
@endphp

@for ($i = 0; $i < 6; $i++)
   <p> {{ $weatherData['hourly']['time'][$i] }} - Temperature {{ $weatherData['hourly']['temperature_2m'][$i] }} degrees </p>
@endfor