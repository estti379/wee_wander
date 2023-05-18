<x-layout :pageTitle=$pageTitle>

  @foreach($adventures as $adventure)
          <p>Trail title : {{ $adventure->trail->name }}</p>
          <p>Starting Time: {{ $adventure->start_date }}</p>
  @endforeach
</x-layout>