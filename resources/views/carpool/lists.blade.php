



{{-- ====================  ShareRoad List ===================== --}}

<x-layout>
    <h2>Available carpool</h2>
    <ul>
     @if ( count($shareroaddetails) ==0 )
        <?php echo 'empty';?> 
     
     @else
     @foreach ($shareroaddetails as $element)
        <li> <x-shareroad_card :element='$element'/></li> 
        @endforeach
        @endif
    
    </ul>
</x-layout>