<x-layout :pageTitle=$pageTitle>
  <h5 class=text-center >Events List</h5>
  
    {{-- informations being retrieved by the eventsCard() method in controllers --}}
    @foreach ($events as $event)
    
    <x-events.condensed-card :event="$event"/>
     
    @endforeach
    {{-- For pagination --}}
    {{ $events->withQueryString()->links() }} 
  
</x-layout>
