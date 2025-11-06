<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo', 
        'tier'
    ];

    public function getTierLabelAttribute()
    {
        return ucfirst($this->tier);
    }

    public function scopeByTier($query, $tier)
    {
        return $query->where('tier', $tier);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('tier')->orderBy('name');
    }
}