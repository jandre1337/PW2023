<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;

    protected $fillable = ['n_lugar','estado','zona_id','vip','veiculo_id','frota_id'];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
