<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    public function piso()
    {
        return $this->belongsTo(Piso::class);
    }
    public function lugares()
    {
        return $this->hasMany(Lugar::class);
    }
}
