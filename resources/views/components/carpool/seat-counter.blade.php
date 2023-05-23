@props(['element'])

@php
    $occupiedSeats = count($element->participants);
@endphp

{{ $element->max_seats - $occupiedSeats}}/{{ $element->max_seats}}