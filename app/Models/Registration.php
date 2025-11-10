<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Registration extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'position',
        'qr_code',
        'barcode_number',
        'ticket_type',
        'is_checked_in',
        'checked_in_at',
        'checked_in_by',
        'checkin_method',
    ];

    protected $casts = [
        'is_checked_in' => 'boolean',
        'checked_in_at' => 'datetime',
    ];

    // ✅ Format waktu Indonesia untuk checked_in_at
    protected function checkedInAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['checked_in_at'] 
                ? \Carbon\Carbon::parse($attributes['checked_in_at'])->timezone('Asia/Jakarta')->format('d/m/Y H:i:s')
                : null,
        );
    }

    protected function createdAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => \Carbon\Carbon::parse($attributes['created_at'])->timezone('Asia/Jakarta')->format('d/m/Y H:i:s'),
        );
    }

    protected function updatedAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => \Carbon\Carbon::parse($attributes['updated_at'])->timezone('Asia/Jakarta')->format('d/m/Y H:i:s'),
        );
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function scanner()
    {
        return $this->belongsTo(Admin::class, 'checked_in_by');
    }
}