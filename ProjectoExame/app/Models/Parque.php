<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parque extends Model
{
    use HasFactory;

    protected $fillable = ['nome','localizacao','estado','created_at','updated_at'];


    public function pisos()
    {
        return $this->hasMany(Piso::class);
    }
}
