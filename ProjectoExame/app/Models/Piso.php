<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;

    public function parque()
    {
        return $this->belongsTo(Parque::class);
    }
    public function zonas()
    {
        return $this->hasMany(Zona::class);
    }
}
