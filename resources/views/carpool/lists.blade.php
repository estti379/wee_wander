{{-- @props(['shareRoadDetails']) --}}

{{-- ====================  ShareRoad List ===================== --}}

<x-layout :pageTitle='$pageTitle'>
    <h2 class="card-header">Available carpools</h2>
    
        @if ($shareRoadDetails === null || count($shareRoadDetails) === 0)
            <li>empty</li>
        @else
            @foreach ($shareRoadDetails->sortByDesc('created_at') as $element)
                <li><x-shareroad_card :element="$element"/></li>
            @endforeach
        @endif
       {{-- For pagination --}}
   {{ $carpoolPages->links()}} 
</x-layout>


<link rel="stylesheet" href="/css/carpool_card_style.css">