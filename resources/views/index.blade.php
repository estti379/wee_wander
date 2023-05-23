<x-layout :pageTitle="$pageTitle">
    <h1 class="text-center"> Welcome to WeeWANDER</h1>
    <img src="{{ URL::asset('/images/pictures/mullerthal.png') }} "width="100%">
    <p>Website for hiking /trekking enthusiast who wants do discover luxemburgish beautifully nature.</p>
    <hr>
    This Page is still empty!

    <hr>
    last created Car pool: not integred yet
    @yield('last_carpool')

</x-layout>