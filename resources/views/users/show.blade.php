<x-layout  :pageTitle="$pageTitle">

    <h2>Page of user: {{$userDetails->firstname}} {{$userDetails->lastname}}</h2>
    
    <div>
        <div>
           <img src={{$userDetails->picture}}>
        </div>
        <div>
            <p>First Name: {{$userDetails->firstname}}</p>
            <p>Last Name: {{$userDetails->lastname}}</p>
            <br>
            @if ($isOwner)
                <h4>Information shown only to owner:</h4>
                <p>Username: {{$userDetails->username}}</p>
                <p>Email: {{$userDetails->email}}</p>
            @endif           
        </div>
    </div>
    <hr>
    <h4>Bio:</h4>
    <p>{{$userDetails->description}}</p>
    <hr>
    <p>Owns a car: {{$userDetails->car_owned}}</p>
    <p>Has a driver license:{{$userDetails->driver_license}}</p>
    <hr>
</x-layout>