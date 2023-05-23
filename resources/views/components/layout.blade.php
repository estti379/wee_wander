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
  <link rel="stylesheet" href="/css/main-style.css">
  {{-- BOOTSTRAP CDN  --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>
  {{-- FontAwsome CDN --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- Leaflet.js LIVRARY TO MAP --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body id="body">
  {{---------------------------------------------------- NAVBAR --------------------------------------------------------------}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="{{ URL::asset('images\pictures\weewander-1.png') }}" width="100px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/events"> Events list</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/create-event">Create Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/carpool">Carpool Lists</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/carpool/create">Carpool Create</a>
          </li>
        </ul>
        <div class="nav-item">
          <x-nav-login/>
        </div>
      </div>
    </div>
  </nav>
  {{------------------------------------------------------------------------------------------------------------------}}
  {{-- This is a alpha version. Just the skeleton --}}
  <main>
    {{ $slot }}

  </main>
  
  <footer>
    <ul>
      <li><a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #ffffff; "></i></li>
      <li><a href=""><i class="fa-brands fa-instagram fa-xl" style="color: #ffffff;"></i></li>
      <li><a href=""><i class="fa-brands fa-linkedin fa-xl" style="color: #ffffff;"></i></li>
      <li><a href=""><i class="fa-brands fa-github fa-xl" style="color: #ffffff;"></i></li>
    </ul>
    <p>WeeWander Footer &copy;</p>
  </footer>

    {{-- scripts will be pushed into here --}}
    @stack('scripts')
</body>
</html>

