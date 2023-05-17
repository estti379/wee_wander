<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/event_card_style.css">
</head>
<body>
  {{-- Possible navbar --}}
  <nav>
    <ul>
      <li><a href="/events"> Events list page</a></li>
      {{-- TRAIL AND EVENTS LINK ARE BUGGED; FIX OTHER DAY --}}
      <li><a href="/events/{id}">Event details</a></li>
      <li><a href="/events/{id}/trail">Trail Details</a></li>
      <li><a href="/create-event">Create Event</a></li>
    </ul>
  </nav>



  {{-- This is a alpha version. Just the skeleton --}}
  <main>
    @yield('content')
  </main>

  <footer>
    WeeWander Footer &copy;
  </footer>
  @yield('createform')
</body>
</html>