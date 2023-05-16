<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdventureParticipants extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_adventure',
        'id_participant',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(AdventureParticipants::class, 'id_participant');
    }

    public function events(): BelongsTo
    {
        return $this->belongsTo(AdventureParticipants::class, 'id_adventure');
    }
}
