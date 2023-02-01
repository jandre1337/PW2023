<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    use HasFactory;

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
