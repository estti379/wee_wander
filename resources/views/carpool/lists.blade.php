@props(['shareRoadDetails'])

{{-- ====================  ShareRoad List ===================== --}}

<x-layout>
    <h2>Available carpools</h2>
    <ul>
        @if ($shareRoadDetails === null || count($shareRoadDetails) === 0)
            <li>empty</li>
        @else
            @foreach ($shareRoadDetails->sortByDesc('created_at') as $element)
                <li><x-shareroad_card :element="$element"/></li>
            @endforeach
        @endif
    </ul>
</x-layout>


<link rel="stylesheet" href="/css/carpool_card_style.css">