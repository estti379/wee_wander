@props(['user'])

<div>
    <h2>The carpool drives to <?php echo $user['adventure']; ?> at ('start_date');</h2>
        <p>name: <?php echo $user['username'];?></p>
        <p>City Departure: <?php echo $user['location']; ?></p>  
        <p>Adventure: <?php echo $user['adventure']; ?></p>           
        <p>Seats available: <?php echo $user['seats']; ?></p>
        <p>Bike Rack available: <?php echo $user['bike_rack']; ?></p>
        <p>Date: <?php echo $user['date']; ?></p>
        <p>Time: <?php echo $user['time']; ?></p>
        <p>Luggage allowed: <?php echo $user['luggage']; ?></p>
        <p>Dog allowed: <?php echo $user['dog']; ?></p>
        <p>Smokers allowed: <?php echo $user['smokers']; ?></p>
        <p> Asked price : <?php echo $user['price']; ?></p>
    
    <button>Driver info</button>
</div> 