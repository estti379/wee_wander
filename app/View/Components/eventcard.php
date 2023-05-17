<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class eventcard extends Component
{
    // this is being retrieved from the attribute of the component
    
    

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.eventcard');
    }
    
    /*
    This does not work
    public function eventsData(){
        $events = Event::all();

        return ['events' => $events];
    }
    */
}
