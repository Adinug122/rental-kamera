<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
      protected $fillable = [
        'user_id',
        'kode_booking',
        'tanggal_rental',
        'tanggal_selesai',
        'status_sewa',
        'total_harga',
        'bukti_pembayaran',
    ];

    public function item(){
        return $this->hasMany(RentalItem::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

}
