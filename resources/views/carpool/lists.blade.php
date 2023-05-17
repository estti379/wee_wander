@props(['adventures'])

{{-- ====================  ShareRoad List ===================== --}}

<x-layout>
    <h2>Available carpool</h2>
    <ul>
        @if ($shareroaddetails === null || count($shareroaddetails) === 0)
            <li>empty</li>
        @else
            @foreach ($shareroaddetails as $element)
                <li><x-shareroad_card :element="$element" :adventures="$adventures" /></li>
            @endforeach
        @endif
    </ul>
</x-layout>


<link rel="stylesheet" href="/css/carpool_card_style.css">