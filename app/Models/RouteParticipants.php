<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RouteParticipants extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'participant_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'route_participants';
}
