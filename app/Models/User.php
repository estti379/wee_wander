<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Event;
use App\Models\Route;
use App\Models\AdventureParticipants;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'firstname',
        'lastname',
        'picture',
        'description',
        'car_owned',
        'driver_license',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, "organizer_id");
    }

    public function adventure_participants(): HasMany
    {
        return $this->hasMany(AdventureParticipants::class);
    }

    public function routes(): HasMany
    {
        return $this->hasMany(Route::class);
    }

    
}
