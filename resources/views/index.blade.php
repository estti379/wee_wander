<x-layout :pageTitle="$pageTitle">
    
    <!--========================== Heading ==============================-->
    <div class="heading">
        <h1><strong> Welcome to WeeWANDER</strong></h1>
        <p>Website for hiking /trekking enthusiast who wants do discover luxemburgish beautifully nature.</p>
    </div>
    <hr>
    @yield('publicity')
    <div>
        <h2>We Wander </h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea voluptatum reiciendis tempore odit unde beatae.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet assumenda distinctio sequi beatae soluta reprehenderit.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eos animi explicabo dolorum tempore pariatur consequatur fuga voluptas. 
            Laudantium veniam ex doloremque debitis mollitia quam harum minus eius, quidem ipsam.</p>
    </div>
    <hr>
    last created Car pool: not integred yet
    @yield('last_carpool')

</x-layout>