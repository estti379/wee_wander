<x-layout :pageTitle=$pageTitle>
    <h5>
        Participation list for
        <a href="/trail/{{$adventure->trail->id}}">{{$adventure->trail->name}}</a>
        :
    </h5>

    <ul>
    @foreach ($participants as $user)
        <li>
            <a href="/users/{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</a> will be participating!
        </li>
    @endforeach
    </ul>
    <a href="/events/{{$adventure->event->id}}">Back</a>
</x-layout>