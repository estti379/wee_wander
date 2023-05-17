<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
  {{-- Possible navbar --}}
  <nav>
    <ul>
      <li><a href="/events"> Events list page</a></li>
      <li><a href="/events/{id}">Events Details</a></li>
      <li><a href="/events/{id}/trail">Trail Details</a></li>
      <li><a href="/create-event">Create Event</a></li>
      <li><a href="/carpool/lists">Carpool Lists </a></li>
      <li><a href="/carpool/create">Carpool Create </a></li>
    </ul>
  </nav>
  {{-- This is a alpha version. Just the skeleton --}}
  <main>
    {{ $slot }}
  </main>
  
  <footer>
    WeeWander Footer &copy;
  </footer>
</body>
</html>

