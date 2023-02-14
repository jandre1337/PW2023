<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    protected $fillable = ['nome','preco','taxa_extra','desconto'];

    public function zona_tarifas()
    {
        return $this->hasMany(ZonaTarifa::class);
    }

}
