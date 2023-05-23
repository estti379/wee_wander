<x-layout :pageTitle=$pageTitle>
<div class="trail-details-card">
  <h1>Trail Details</h1>
  {{-- <p><strong>Trail ID : </strong>{{ $trail->id }}</p> --}}
  <p><strong>Trail title : </strong></strong>{{ $trail->name }}</p>
  <p><strong>Distance : </strong></strong>{{ $trail->distance }} Mts</p>
</div>
<div>
  @if ($trail->gpx_gdid == '')
  <p><strong>Starting location latitude : </strong></strong>{{ $trail->location_long }} Mts</p>
  <p><strong>Starting location longitude : </strong></strong>{{ $trail->location_latit }} Mts</p>
  @endif
  {{-- {{$trail->gpx_gdid}} --}}
  <iframe src="https://gpx.studio/?state=%7B%22ids%22:%5B%22{{ $trail->gpx_gdid }}%22%5D%7D&embed&distance" width="100%" height="500" frameborder="0" allowfullscreen></iframe>
</div>
</x-layout>