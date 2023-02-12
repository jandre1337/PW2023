<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    use HasFactory;

    protected $fillable = ['lugar_id','matricula','data_entrada','data_saida','zona_id','veiculo_id'];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
    public function lugar()
    {
        return $this->belongsTo(Lugar::class);
    }
}
