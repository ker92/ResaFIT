<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'nom',
        'date_heure',
        'places_max'
    ];

    protected $casts = [
        'date_heure' => 'datetime',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
