{{-- provisory css imported just to see the component --}}
<link rel="stylesheet" href="/css/event_card_style.css">

{{-- Display weather information inside the component this takes information from app\view\components\weatherapi.php --}}
<div class="weather-component">
    {{-- Just static info from the DB --}}
    <div class="card mb-3" style="max-width: 540px;">
        @php
            $adventureDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $adventureDate);
            $adventureDateFormat = $adventureDateTime->format('d-m-Y');
            $adventureHour = $adventureDateTime->format('Y-m-d\TH:00');
            $adventureIndex = array_search($adventureHour, $weatherData['hourly']['time']);
        @endphp
        <h3 class="card-header">Forecast for {{ $trailName }} on {{ $adventureDateFormat }} </h3>
        @if ($adventureIndex !== false)
            <p>Average temperature for {{ $adventureDateFormat }} :
                {{ $weatherData['hourly']['temperature_2m'][$adventureIndex] }} &#8451;
            </p>
            @if ($weatherData['hourly']['precipitation_probability'][$adventureIndex] !== null)
                <p>Average Precipitation Probability for adventure date:
                    {{ $weatherData['hourly']['precipitation_probability'][$adventureIndex] }} %</p>
            @else
                <p> Precipitation Probability for the date of this adventure is not available yet. </p>
            @endif
        @else
            <p>There is no weather data available for this date yet. &#x1F61E;</p>
        @endif
        <h3 class="card-header">Forecast now for {{ $trailName }}{{-- now()->format('Y-m-d') --}} </h3>
        <div class="row g-0">
            <div class="col-md-4">
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
            </div>
            <div class="col-md-8">
                <p class="card-text">Temperature Max : {{ $weatherData['daily']['temperature_2m_max']['0'] }}
                    &#8451;
                </p>
                <p class="card-text">Temperature Min : {{ $weatherData['daily']['temperature_2m_min']['0'] }}
                    &#8451;
                </p>
                {{-- Set time, time format and set the next hour time --}}
                @php
                    $currentTime = \Carbon\Carbon::now();
                    $currentHour = $currentTime->format('Y-m-d\TH:00');
                    $nextHourIndex = array_search($currentHour, $weatherData['hourly']['time']) + 1;
                @endphp

                {{-- Get the information of the temperature for next hour --}}
                {{-- Display a little Illustrative icon --}}
                @if ($nextHourIndex < count($weatherData['hourly']['time']))
                    <p>Temperature Now: {{ $weatherData['hourly']['temperature_2m'][$nextHourIndex] }} &#8451;</p>
                    <p>Precipitation Probability next hour:
                        {{ $weatherData['hourly']['precipitation_probability'][$nextHourIndex] }} %</p>
                    {{-- Put illustrative picture according to the weathercode of the trail. Information of the API
                        Values are on the documentation  --}}
                @else
                    <p>Weather data for the next hour is not available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
