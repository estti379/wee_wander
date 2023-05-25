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
    <div class="card" id="intro">
        <h1><span>Wee Wander</span> makes wonder</h1><span><strong>description:</strong><span>
        <p>Welcome to Wee Wander, the ultimate platform for hiking, trekking, and mountain bike enthusiasts who want to experience the beauty of Luxembourg's nature firsthand. "Wee" means "way" in Luxembourgish, reflecting our dedication to exploring the stunning landscapes this country has to offer.
            At Wee Wander, we believe in connecting individuals with Luxembourg's natural wonders. Our website serves as a hub for like-minded adventurers to come together, create thrilling events, and embark on unforgettable journeys through the country's breathtaking landscapes.</p>
        <p>Whether you're captivated by the lush green forests, mesmerized by the picturesque valleys, or enchanted by the hidden trails, Wee Wander is your portal to immersing yourself in Luxembourg's natural splendor. Join our vibrant community of outdoor enthusiasts and uncover the hidden gems that await you.
            With Wee Wander, you have the power to create and join a diverse range of events, including hiking excursions, challenging treks, and thrilling mountain bike rides. Together, we can explore the most scenic routes and uncover the secrets of Luxembourg's natural wonders.</p>
        <p>In addition to event creation and participation, our platform offers a convenient carpooling feature. By encouraging shared transportation, we aim to minimize our ecological footprint and contribute to the preservation of Luxembourg's pristine landscapes. We believe that by working together, we can create a sustainable future for outdoor adventures in this beautiful country.
            Embrace the spirit of adventure, connect with fellow nature enthusiasts, and experience the magic of Luxembourg's natural landscapes with Wee Wander. Start your journey today and let Luxembourg's nature take center stage in your outdoor pursuits. Let's wander through the heart of Luxembourg, one step at a time.</p>
       
    </div>
    <hr>
    <div class="card card-list">
        <div class="card">
        Last created Carpool:
        <br>
        <x-carpool.shareroad_card :element="$latestCarpool" />
        </div>
        <div class="card">
        Last created event:
        <br>
        <x-events.condensed-card :event="$latestEvent" />
    </div>

</x-layout>
