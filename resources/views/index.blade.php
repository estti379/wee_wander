@push('style')
    <link rel="stylesheet" href="/css/main-style.css">
@endpush
<x-layout :pageTitle="$pageTitle">
    <!--========================== Heading ==============================-->
    <div class="heading">
        <div id="title">
            <h1><strong> Welcome to <span>Wee</span>WANDER</strong></h1>
            <p>Website for hiking /trekking enthusiast who wants do discover luxemburgish beautifully nature.</p>  
        </div> 
    </div>
    <hr>
    @yield('publicity')
    <div class="card">
        <h1>Wee Wander</h1><span>description:<span>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea voluptatum reiciendis tempore odit unde beatae.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet assumenda distinctio sequi beatae soluta reprehenderit.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eos animi explicabo dolorum tempore pariatur consequatur fuga voluptas. 
            Laudantium veniam ex doloremque debitis mollitia quam harum minus eius, quidem ipsam.</p>
    </div>
    <hr>
    <div class="card" id="index-card-container">
        <div class="card">
    <p> Last created Carpool:</p>
        <br>
        <x-carpool.shareroad_card :element="$latestCarpool" />
        </div>
        <div class="card">
        Last created event:
        <br>
        <x-events.condensed-card :event="$latestEvent" />
    </div>

</x-layout>
