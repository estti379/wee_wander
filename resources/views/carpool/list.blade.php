{{-- ShareRoad List --}}


<x-layout>
    <h2>Available carpool</h2>
    <ul>

        @foreach ($users as $user)
        <li> <x-shareroad_card :user='$user'/></li> 
        @endforeach
    </ul>
</x-layout>