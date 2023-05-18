    {{-- provisory css imported just to see the component --}}
    <link rel="stylesheet" href="/css/event_card_style.css">
    <div class="weather-component">
        <h2>Forecast for the trail</h2>
        <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
        {{-- Display weather information inside the component
        this takes infromation from app\view\components\weatherapi.php --}}

        @for ($i = 0; $i < 6; $i++)
            <p> {{ $weatherData['hourly']['time'][$i] }} - Temperature {{ $weatherData['hourly']['temperature_2m'][$i] }} degrees </p>
        @endfor
        {{-- {{ dd($weatherData) }} --}}
    </div>

