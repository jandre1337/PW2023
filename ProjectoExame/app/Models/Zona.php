<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_zona','valor_zona','modelo','piso_id'];

    public function piso()
    {
        return $this->belongsTo(Piso::class);
    }
    public function lugares()
    {
        return $this->hasMany(Lugar::class);
    }
    public function bilhetes()
    {
        return $this->hasMany(Bilhete::class);
    }
    public function zona_tarifas()
    {
        return $this->hasMany(ZonaTarifa::class);
    }
}
