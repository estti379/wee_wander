<?php

namespace App\Models;

use App\Models\Trails;
use Illuminate\Database\Eloquent\Model;
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
        return $this->belongsTo(Trails::class, 'id_trail');
    }



}
