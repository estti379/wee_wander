@pushOnce('style')
    <link rel="stylesheet" href="{{ URL::asset('/css/carpool_card_style.css') }}">
@endpushOnce

{{-- ====================  ShareRoad List ===================== --}}

<x-layout :pageTitle='$pageTitle'>
    <div class="card">
        <h5 class="card-title">Available carpools</h5>
    </div>
    <div class="card-list card">
    
        @if ($shareRoadDetails === null || count($shareRoadDetails) === 0)
            <li>empty</li>
        @else
            @foreach ($shareRoadDetails->sortByDesc('created_at') as $element)
                <x-carpool.shareroad_card :element="$element"/>
            @endforeach
        @endif
    </div>
    {{-- For pagination --}}
    {{ $shareRoadDetails->withQueryString()->links() }} 
</x-layout>