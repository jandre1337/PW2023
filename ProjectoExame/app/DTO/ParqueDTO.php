<?php

namespace App\DTO;

class ParqueDTO
{
    public $nome;
    public $localizacao;
    public $estado;

    public function __construct( string $nome, string $localizacao, int $estado)
    {
        $this->zone_id = $nome;
        $this->localizacao = $localizacao;
        $this->estado = $estado;
    }
}


