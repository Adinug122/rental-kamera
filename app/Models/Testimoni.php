<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
        protected $fillable = [
        'nama_user',
        'isi_pesan',
        'foto',
        'is_active',
    ];
    
}
