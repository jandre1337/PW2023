<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonaTarifa extends Model
{
    use HasFactory;

    protected $fillable = ['zona_id','tarifa_id','data_entrada','data_saida','modalidade', 'tamanho_frota'];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
    public function tarifa()
    {
        return $this->belongsTo(Tarifa::class);
    }
}
