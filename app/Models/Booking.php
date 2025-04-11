<?php

namespace App\Models;
use App\Models\Event;


use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'booking_date',
        'tickets',
        'total_price',
    ];

    public function event()
{
    return $this->belongsTo(Event::class);
}

    
}
