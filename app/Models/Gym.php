<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'ville',
        'pays',
        'capacite'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function accessLogs()
    {
        return $this->hasMany(AccessLog::class);
    }
}
