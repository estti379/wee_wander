<x-layout  :pageTitle="$pageTitle">

    <h2>Page of user: {{$userDetails->firstname}} {{$userDetails->lastname}}</h2>
    
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
</x-layout>