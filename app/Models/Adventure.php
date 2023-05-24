<?php

namespace App\Models;

use App\Models\Trail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Adventure extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'trail_id',
        'start_date',
        'due_date',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function trail(): BelongsTo
    {
        return $this->belongsTo(Trail::class);
    }

    public function routesStart(): HasMany
    {
        return $this->hasMany(Route::class, "start_adventure_id");
    }

    public function routesEnd(): HasMany
    {
        return $this->hasMany(Route::class, "end_adventure_id");
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'adventure_participants', 'adventure_id', 'participant_id')->withTimestamps();
    }


}
