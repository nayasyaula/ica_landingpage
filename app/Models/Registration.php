<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'position',
        'qr_code',
        'is_checked_in',
        'checked_in_at',
        'scanned_by',
        'scanned_at',
        'scanner_name'
    ];

    protected $casts = [
        'is_checked_in' => 'boolean',
        'checked_in_at' => 'datetime',
        'scanned_at' => 'datetime'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function scanner()
    {
        return $this->belongsTo(Admin::class, 'scanned_by');
    }
}