<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frota extends Model
{
    use HasFactory;

    protected $fillable = ['nome','tamanho_frota','user_id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
