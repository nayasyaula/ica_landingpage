<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'event_date',
        'location',
        'capacity',
        'is_active'
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function getAvailableSlotsAttribute()
    {
        return $this->capacity - $this->registrations()->count();
    }
}
