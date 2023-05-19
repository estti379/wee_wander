<x-layout :pageTitle=$pageTitle>
<div class="trail-details-card">
  <h1>Trail Details</h1>
  
  <p><strong>Adventure ID : </strong>{{ $adventures[0]['id'] }}</p>
  <p><strong>Trail ID : </strong>{{ $adventures[0]['trail']['id'] }}</p>
  <p><strong>Trail title : </strong></strong>{{ $adventures[0]['trail']['name'] }}</p>
  <p><strong>Distance : </strong></strong>{{ $adventures[0]['trail']['distance'] }} Mts</p>
  <p><strong>Starting Time : </strong></strong>{{ $adventures[0]['start_date'] }}</p>
  <p>This is resources\views\trails\trail-details.blade.php </p>
  <p>Need to find some way to fill this with image or something like that</p>
</div>
<div>
  {{-- {{ dd($adventures[0]['id']) }} --}}
  
</div>
</x-layout>