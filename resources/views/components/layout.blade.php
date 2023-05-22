@props(['pageTitle'])
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$pageTitle}}</title>
  
  {{-- css styles will be pushed into here --}}
  @stack('style')
  <link rel="stylesheet" href="/css/event_card_style.css">
  {{-- BOOTSTRAP CDN  --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>
  {{-- Leaflet.js LIVRARY TO MAP --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
  {{-- Possible navbar --}}
  <nav>
    <ul>
      <li><a href="/events"> Events list page</a></li>
      {{-- <li><a href="/events/{{$id}}">Events Details</a></li> --}}
      {{-- <li><a href="/events/{{$id}}/trail">Trail Details</a></li> --}}
      <li><a href="/create-event">Create Event</a></li>
      <li><a href="/carpool">Carpool Lists </a></li>
      <li><a href="/carpool/create">Carpool Create </a></li>
    </ul>
    <div>
        <x-nav-login/>
    </div>
  </nav>
  {{-- This is a alpha version. Just the skeleton --}}
  <main>
    {{ $slot }}
    last created Car pool:
    @yield('last_carpool')

  </main>
  
  <footer>
    WeeWander Footer &copy;
  </footer>

    {{-- scripts will be pushed into here --}}
    @stack('scripts')
</body>
</html>

