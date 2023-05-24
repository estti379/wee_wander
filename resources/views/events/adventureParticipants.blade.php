<x-layout :pageTitle=$pageTitle>
    <div class="card">
    <h5 class="card-header">Participation list for <a href="/trail/{{$adventure->trail->id}}">{{$adventure->trail->name}}</a> :</h5>
    <div class="card-body">
    <ul>
    @foreach ($participants as $user)
        <li>
            <a href="/users/{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</a> will be participating!
        </li>
    @endforeach
    </ul>
    <a href="/events/{{$adventure->event->id}}" class="btn btn-primary">Back</a>    
</div>

</div>
</x-layout>