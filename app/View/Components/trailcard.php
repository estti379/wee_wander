<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class trailcard extends Component
{

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
        return view('components.trailcard');
    }

    public function trailDetails(){
        return [
            'title' => 'Trail title - needs to fetch with the DB',
            'location' => 'Trail location - needs to fetch with the DB',
            'distance' => 'Distance - needs to fetch with the DB',
            'image' => 'Image - needs to fetch the DB'
        ];
    }
}
