
        <div>
            @foreach ($road as $key => $value)
            <h2>Carpool details: Location & Date</h2>
            <p>name: {{$value}}</p> 
            {{--<img src="" alt="portrait"/>--}}
            {{--<p>City Departure: {{$item}}</p>  
            <p>Adventure: {{$item}}</p>           
            <p>Seats available:{{$item}}</p>
            <p>Bike Rack available: {{$item}}</p>
            <p>Date: {{$item}}</p>
            <p>Time: {{$item}}</p>
            <p>Luggage allowed: {{$item}}</p>
            <p>Dog allowed:{{$item}}</p>
            <p>Smokers allowed:{{$item}}</p>--}}
            @endforeach
        
            <button>more info</button>
        </div>
