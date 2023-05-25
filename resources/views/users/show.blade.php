<x-layout  :pageTitle="$pageTitle">
    <div class="card">
<h5 class="card-header">Profil</h5>
<div class="card-body">
<h2 >{{$userDetails->firstname}} {{$userDetails->lastname}}</h2>
    <div>
        <div>
            <img src={{$userDetails->picture}}>
            <br>
            @if ($isOwner)
                <x-users.changeImageForm :userDetails="$userDetails"/>
            @endif 
        </div>
        <div>
            <p>First Name: {{$userDetails->firstname}}</p>
            <p>Last Name: {{$userDetails->lastname}}</p>
            @if ($isOwner)
                <x-users.changeNameForm :userDetails="$userDetails"/>
            @endif
            <br>
            @if ($isOwner)
                <h4>Information shown only to owner:</h4>
                <p>Username: {{$userDetails->username}}</p>
                <p>Email: {{$userDetails->email}}</p>
                <x-users.changeSensitiveForm :userDetails="$userDetails"/>
            @endif           
        </div>
    </div>
    <hr>
    <h4>Bio:</h4>
    <p id="descriptionParagraph">{{$userDetails->description}}</p>
    @if ($isOwner)
        <x-users.changeBioForm :userDetails="$userDetails"/>
    @endif
    <hr>
    <p>Owns a car: {{$userDetails->car_owned}}</p>
    <p>Has a driver license: {{$userDetails->driver_license}}</p>
    @if ($isOwner)
        <x-users.changeDetailsForm :userDetails="$userDetails"/>
    @endif
    <hr>
<div>
    <a href="/events?organizer={{ $userDetails->id }}&old=true&empty=true"><h5>Created event</h5></a>
    
    <a href="/events?participant={{ $userDetails->id }}&old=true&empty=true"><h5>Participating in events</h5></a>
    
    <a href="/carpool?carowner={{ $userDetails->id }}&old=true"><h5>Created carpool</h5></a>
    
    <a href="/carpool?rider={{ $userDetails->id }}&old=true"><h5>Riding in carpools</h5></a>
</div>
</div>
</x-layout>