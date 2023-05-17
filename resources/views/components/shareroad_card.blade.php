
<link rel="stylesheet" href="/css/carpool_card_style.css">


{{--================== SHARE ROAD CARD ==========================--}}

@props(['element'])

<div class="shareroad_card">
    <h2>The carpool drives to {{ $element->start_adventure->trail->name }} on the {{ $element->start_adventure->start_date }}</h2>
        <p>Username: <?php echo $element['carowner_id'];?></p>
        <p>City Departure: <?php echo $element['start_location_long'],$element['start_location_latit']; ?></p>  
        <p>Adventure Name: {{ $element->start_adventure->trail->name }} </p>           
        <p>Adventure Location: <?php echo $element['end_location_long'],$element['end_location_latit']; ?></p>           
        <p>Seats available: <?php echo $element['max_seats']; ?></p>
        <p>Bike Rack available: <?php echo $element['bike_capacity']; ?></p>
        <p>Date & Time Departure: <?php echo $element['start_date']; ?></p>
        <p>Luggage allowed: <?php echo $element['lugage'] ? 'Yes' : 'No'; ?></p>
        <p>Dog allowed: <?php echo $element['pets_allowed'] ? 'Yes' : 'No'; ?></p>
        <p>Smokers allowed: <?php echo $element['smokers_allowed'] ? 'Yes' : 'No'; ?></p>
        <p>Asked price : <?php echo $element['price']; ?></p>
    
        <button><a href="#">Driver info</a></button> <button><a href="carpool/edit">Edit</a><button><a href="carpool/update">Join Carpool</a></button>


</div> 