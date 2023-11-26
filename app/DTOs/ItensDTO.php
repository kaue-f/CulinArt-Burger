<?php

namespace App\DTOs;

class ItensDTO
{
    public array $listaItens;

    public function __construct(array $pedidos)
    {
        $this->listaItens = $pedidos;
    }
}
