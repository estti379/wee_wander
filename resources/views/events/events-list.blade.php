
<x-layout>
  
  {{-- Events list view --}}
  {{-- The variables are being retrieved from the route --}}
  {{-- If youre passing a variable, we need to use : before  --}}
  <x-eventcard text="This is the event card - Just example" :eventTitle="$eventTitle"/> <br>  
</x-layout>