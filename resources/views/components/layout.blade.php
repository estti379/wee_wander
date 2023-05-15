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
      <li>item 1</li>
      <li>Item 2</li>
      <li>Item 3</li>
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