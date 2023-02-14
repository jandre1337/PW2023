<?php

namespace App\DTO;

class ClienteDTO
{
    public $name;
    public $email;
    public $cc;

    public function __construct( string $name, string $email, int $cc)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cc = $cc;
    }
}


