@if (session()->has('message'))
    <div class="fixed top-0 left-1/2 transform -translate-x-1/2
    bg-laravel px-48 py-3 "
    x-data={show:true} 
    x-init="setTimeout(() => show=false, 3000)" 
    x-show="show" id="message"
    >
    {{--
        x-data={show:true}  : when triggered it will put this to TRUE
                                meaning it will show the message
        x-init=etc etc : it put a timer of 3sec after what it will goes to false
        and when it goes to false >
        x-show="show" : the "show" we have in the  x-data="{show: true}
        will be put in false so it will disapear x-data="{show: true}
        --}}
    <p>
        {{session('message')}}
    </p>
    </div>
    
@endif