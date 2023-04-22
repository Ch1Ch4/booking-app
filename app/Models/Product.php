<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'type',
        'description',
        'capacity',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookingsCount()
    {
        return $this->bookings->count();
    }

    public function isAvailableForBooking()
    {
        return $this->bookingsCount() < $this->capacity;
    }

}
