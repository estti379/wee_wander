<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdventureParticipants extends Model
{
    use HasFactory;

    protected $fillable = [
        'adventure_id',
        'participant_id',
    ];


}
