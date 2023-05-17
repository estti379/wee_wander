<?php

namespace App\Models;

use App\Models\Trail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adventure extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_event',
        'id_trail',
        'start_date',
        'due_date',
    ];

    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function trails(): BelongsTo
    {
        return $this->belongsTo(Trail::class, 'id_trail');
    }

    public function routes_start(): HasMany
    {
        return $this->hasMany(Route::class);
    }

    public function routes_end(): HasMany
    {
        return $this->hasMany(Route::class);
    }



}
