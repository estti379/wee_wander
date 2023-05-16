<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'luggage',
        'id_carowner',
        'id_start_adventure',
        'id_end_adventure',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_carowner');
    }

    public function adventures_start(): BelongsTo
    {
        return $this->belongsTo(Adventure::class, 'id_start_adventure');
    }

    public function adventures_end(): BelongsTo
    {
        return $this->belongsTo(Adventure::class, 'id_end_adventure');
    }




    /*
    // method for carpool create 
    public function create(){
        return view ('carpool.create');
    }
    public function all(){    //retrieve = all
        return [
            'start_location_long' => '',
            'start_location_latit' => '',
            'end_location_long' => '',
            'end_location_latit' => '',
            'distance' => '',
            'start_date' => '',
            'price' => '',
            'max_seats' => '',
            'bike_capacity' => '',
            'pets_allowed' => '',
            'smokers_allowed' => '',
            'luggage' => '',
            'id_carowner' => '',
            'id_start_adventure' => '',
            'id_end_adventure' => ''
        ];
    }

    public function find($id){
        $carpoolDetails=self::all();
        foreach($carpoolDetails as $carpoolDetail){
            if($carpoolDetail['id'== $id]){
                return $carpoolDetail;
            }
        }
    }
    

    
*/
}
