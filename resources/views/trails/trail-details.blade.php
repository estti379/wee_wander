<x-layout :pageTitle=$pageTitle>
<div class="trail-details-card">
  <h1>Trail Details</h1>
  @foreach($adventures as $adventure)
    <p><strong>Trail ID : </strong>{{ $adventure->trail->id }}</p>
    <p><strong>Trail title : </strong>{{ $adventure->trail->name }}</p>
    <p><strong>Distance : </strong>{{ $adventure->trail->distance }} mts</p>
    <p><strong>Starting Time: </strong>{{ $adventure->start_date }}</p>
  @endforeach
  <p>This is resources\views\trails\trail-details.blade.php </p>
  <p>Need to find some way to fill this with image or something like that</p>
</div>
</x-layout>