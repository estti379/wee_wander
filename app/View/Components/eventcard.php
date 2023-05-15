<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class eventcard extends Component
{
    // this is being retrieved from the attribute of the component
    public $text;
    public $eventTitle;
    

    /**
     * Create a new component instance.
     */
    public function __construct($text, $eventTitle)
    {
        //
        $this->text = $text;
        $this->eventTitle = $eventTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.eventcard');
    }
    
    public function eventsData(){
        return [
            'location' => 'Location of the Event',
            'start_date' => 'Starting Data Information - 01/01/2025',
            'end_date' => 'Ending Date Information- 01/01/2026',
            'Distance' => 'Distance information of event - 10km'
        ];
    }
}
