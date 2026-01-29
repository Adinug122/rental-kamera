<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalItem extends Model
{
    protected $fillable = [
        'rental_id',
        'product_id',
        'qty',
        'subtotal',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
