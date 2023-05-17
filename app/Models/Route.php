<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'carowner_id',
        'start_adventure_id',
        'end_adventure_id',
    ];

    public function carowner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function start_adventure(): BelongsTo
    {
        return $this->belongsTo(Adventure::class);
    }

    public function end_adventure(): BelongsTo
    {
        return $this->belongsTo(Adventure::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Route::class, 'route_participants', 'route_id', 'participant_id');
    }
}
