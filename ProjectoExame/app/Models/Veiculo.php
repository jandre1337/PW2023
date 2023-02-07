<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['matricula','marca','modelo','ano','user_id','frota_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function frota()
    {
        return $this->belongsTo(Frota::class);
    }
}
