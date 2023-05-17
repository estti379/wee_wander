<?php

namespace App\Models;

use App\Models\Adventure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trails extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'distance',
        'location_long',
        'location_latit'
    ];

    public function adventures(): HasMany
    {
        return $this->hasMany(Adventure::class);
    }
}
