
<link rel="stylesheet" href="/css/carpool_card_style.css">


{{--================== SHARE ROAD CARD ==========================--}}

@props(['element'])

<div class="shareroad_card">
    <h2>The carpool drives to {{ $element->start_adventure->trail->name }} on the {{ $element->start_adventure->start_date }}</h2>
        <p>Username: <?php echo $element['id_carowner'];?></p>
        <p>City Departure: <?php echo $element['start_location_long'],$element['start_location_latit']; ?></p>  
        <p>Adventure: <?php echo $element['end_location_long'],$element['end_location_latit']; ?></p>           
        <p>Seats available: <?php echo $element['max_seats']; ?></p>
        <p>Bike Rack available: <?php echo $element['bike_capacity']; ?></p>
        <p>Date & Time : <?php echo $element['start_date']; ?></p>
        <p>Lugage allowed: <?php echo $element['lugage']; ?></p>
        <p>Dog allowed: <?php echo $element['pets_allowed']; ?></p>
        <p>Smokers allowed: <?php echo $element['smokers_allowed']; ?></p>
        <p> Asked price : <?php echo $element['price']; ?></p>
    
    <button>Driver info</button>
</div> 