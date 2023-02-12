<?php

namespace App\Http\Services;

use App\DTO\ParqueDTO;
use App\Models\Parque;

class ParqueServices
{
    public function createParque(ParqueDTO $parqueDTO)
    {
        $parque = new Parque();

        $parque->fill([
            'nome' => $parqueDTO->nome,
            'localizacao' => $parqueDTO->localizacao,
            'estado' => $parqueDTO->estado == "on",
        ])->save();

        return $parque;
    }

}
