<?php

namespace App\Models;

use App\Models\User;
use App\Models\Adventure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'organizer_id',
    ];


    //relationships
    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function adventures(): HasMany{

        return $this->hasMany(Adventure::class);
    }

    public function adventure_participants(): HasMany
    {
        return $this->hasMany(AdventureParticipants::class);
    }
}
