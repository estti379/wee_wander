{{-- provisory css imported just to see the component --}}
<link rel="stylesheet" href="/css/event_card_style.css">
{{-- Display weather information inside the component this takes information from app\view\components\weatherapi.php --}}
<div class="weather-component">
    <h3>Forecast in this trail for today {{ now()->format('Y-m-d H:i:s') }} </h3>
    <p>Temperature Max : {{ $weatherData['daily']['temperature_2m_max']['0']}} &#8451;</p>
    <p>Temperature Min : {{ $weatherData['daily']['temperature_2m_min']['0']}} &#8451;</p>
    @php
        $currentTime = \Carbon\Carbon::now();
        $currentHour = $currentTime->format('Y-m-d\TH:00');
        $nextHourIndex = array_search($currentHour, $weatherData['hourly']['time']) + 1;
    @endphp

    @if($nextHourIndex < count($weatherData['hourly']['time']))
        <p>Temperature Now: {{ $weatherData['hourly']['temperature_2m'][$nextHourIndex] }} &#8451;</p>
        <p>Precipitation Probability next hour: {{ $weatherData['hourly']['precipitation_probability'][$nextHourIndex] }} %</p>
    @else
        <p>Weather data for the next hour is not available.</p>
    @endif
</div>
