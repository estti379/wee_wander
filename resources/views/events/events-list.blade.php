<x-layout :pageTitle=$pageTitle>
  <div class="card">
    <h5 class="card-title">Events List</h5>
  </div>
    <div class="card-list card">
      
      {{-- informations being retrieved by the eventsCard() method in controllers --}}
      @foreach ($events as $event)
      
      <x-events.condensed-card :event="$event"/>
      
      @endforeach
    </div>
    {{-- For pagination --}}
    {{ $events->withQueryString()->links() }} 
    
  
</x-layout>
