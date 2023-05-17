{{-- import css provisory 
<link rel="stylesheet" href="/css/event_card_style.css">

    Div of the card 
    <div class="trail-card">
        <h2>This is the trail card</h2>
        @foreach ($trailDetails as $item)
            <p>{{$item}}</p>
        @endforeach
        {{-- weather API card - this is a component
        <div class="weatherapi">
            <x-weather-api/>
        </div>
    </div>
 --}}
