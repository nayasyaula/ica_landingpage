<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'tier'
    ];

    // Scope untuk filter by tier
    public function scopeByTier(Builder $query, string $tier)
    {
        return $query->where('tier', $tier);
    }

    // Method untuk mendapatkan URL logo
    public function getLogoUrlAttribute()
    {
        if (!$this->logo) {
            return null;
        }
        
        return Storage::url($this->logo);
    }

    // Method untuk mengecek apakah logo exists
    public function getLogoExistsAttribute()
    {
        return $this->logo && Storage::disk('public')->exists($this->logo);
    }
}