@pushOnce('style')
    <link rel="stylesheet" href="{{ URL::asset('/css/carpool_card_style.css') }}">
@endpush

{{-- ====================  ShareRoad List ===================== --}}

<x-layout :pageTitle='$pageTitle'>
    <h5 class="card-header">Available carpools</h5>
    
        @if ($shareRoadDetails === null || count($shareRoadDetails) === 0)
            <li>empty</li>
        @else
            @foreach ($shareRoadDetails->sortByDesc('created_at') as $element)
                <li><x-carpool.shareroad_card :element="$element"/></li>
            @endforeach
        @endif
       {{-- For pagination --}}
   {{--{{ $carpoolPages->links()}} --}}
</x-layout>