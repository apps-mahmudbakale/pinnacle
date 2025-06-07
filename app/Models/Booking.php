<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'room_id',
        'booking_date',
        'check_in_date',
        'check_out_date',
        'amount',
        'payment_reference'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
