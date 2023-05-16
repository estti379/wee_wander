<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start_location_long',
        'start_location_latit',
        'end_location_long',
        'end_location_latit',
        'distance',
        'start_date',
        'price',
        'max_seats',
        'bike_capacity',
        'pets_allowed',
        'smokers_allowed',
        'lugage',
        'id_carowner',
        'id_start_adventure',
        'id_end_adventure',
    ];

}
