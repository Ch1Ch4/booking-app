<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'client_id',
        'product_id',
        'booked_on',
    ];

//    protected $with = ['products'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
