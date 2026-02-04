<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
    'benefits' => 'array', 
    'is_new' => 'boolean',
    'is_sale' => 'boolean',
];

      protected $fillable = [
        'nama_produk',
        'harga',
        'deskripsi',
        'brands',
        'image',
        'jumlah_unit',
        'is_new',
        'benefits',
        'is_sale',
        'discount',
    ];

public function getHargaFinalAttribute(): int
{
    if (! $this->discount || $this->discount <= 0) {
        return $this->harga;
    }

    $diskon = min($this->discount, 100);

    return (int) ($this->harga - ($this->harga * ($diskon / 100)));
}

    

}
