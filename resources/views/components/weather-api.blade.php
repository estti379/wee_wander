{{-- provisory css imported just to see the component --}}
<link rel="stylesheet" href="/css/event_card_style.css">
{{-- Display weather information inside the component this takes information from app\view\components\weatherapi.php --}}
<div class="weather-component">
    {{-- Just static info from the DB --}}
    <h3>Forecast in this trail for today {{ now()->format('Y-m-d') }} </h3>
    <p>Temperature Max : {{ $weatherData['daily']['temperature_2m_max']['0']}} &#8451;</p>
    <p>Temperature Min : {{ $weatherData['daily']['temperature_2m_min']['0']}} &#8451;</p>
    {{-- Set time, time format and set the next hour time --}}
    @php
        $currentTime = \Carbon\Carbon::now();
        $currentHour = $currentTime->format('Y-m-d\TH:00');
        $nextHourIndex = array_search($currentHour, $weatherData['hourly']['time']) + 1;
    @endphp

    {{-- Get the information of the temperature for next hour --}}
    {{-- Display a little Illustrative icon --}}
    @if($nextHourIndex < count($weatherData['hourly']['time']))
        <p>Temperature Now: {{ $weatherData['hourly']['temperature_2m'][$nextHourIndex] }} &#8451;</p>
        <p>Precipitation Probability next hour: {{ $weatherData['hourly']['precipitation_probability'][$nextHourIndex] }} %</p>
        
        {{-- Put illustrative picture according to the weathercode of the trail. Information of the API
        Values are on the documentation  --}}
        @switch($weatherData['daily']['weathercode'][0])
            @case(0)
                <img src="\images\weather-icons\wi-day-sunny.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(1)
            @case(2)
                <img src="\images\weather-icons\wi-day-cloudy.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(3)
                <img src="\images\weather-icons\wi-cloudy.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(45)
            @case(48)
                <img src="\images\weather-icons\wi-fog.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(51)
            @case(53)
            @case(55)
                <img src="\images\weather-icons\wi-showers.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(56)
            @case(57)
                <img src="\images\weather-icons\wi-snow.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(61)
            @case(63)
            @case(65)
                <img src="\images\weather-icons\wi-rain.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(66)
            @case(67)
                <img src="\images\weather-icons\wi-snow-wind.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(71)
            @case(73)
            @case(75)
            @case(77)
                <img src="\images\weather-icons\wi-snow.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(80)
            @case(81)
            @case(82)
                <img src="\images\weather-icons\wi-storm-showers.svg" alt="sunny-icon" class="weather-icon">
                @break

            @case(85)
            @case(95)
            @case(96)
            @case(99)
                <img src="\images\weather-icons\wi-thunderstorm.svg" alt="sunny-icon" class="weather-icon">
                @break
        @endswitch
    @else
        <p>Weather data for the next hour is not available.</p>
    @endif
</div>
