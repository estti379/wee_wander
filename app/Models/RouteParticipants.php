<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteParticipants extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_route',
        'id_participant',
    ];
}
