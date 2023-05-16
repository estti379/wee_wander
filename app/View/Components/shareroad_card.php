<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class shareroad_card extends Component
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
        return view('components.shareroad_card');
    }
    public function road(){
        return [
            'username' => 'Momo',
            'Location' => 'luxembourg',
            'Adventure' => 'Mersch',
            'Seats' => 1,
            'Bike Rack' => 2,
            'Date' => '26/05/2023',
            'Time' => '15:00',
            'Luggage' => 'yes',
            'Dog' => 'yes',
            'Smokers' => 'yes',
        ];
    }

}
