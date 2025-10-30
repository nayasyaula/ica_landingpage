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
        'qr_code',
        'is_checked_in',
        'checked_in_at'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
