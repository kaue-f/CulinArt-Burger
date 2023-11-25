<?php

namespace App\DTOs;

use App\Models\Cardapio;
use Symfony\Component\HttpFoundation\Session\Session;

class ItensDTO
{
    public array $listaItens;

    public function __construct(array $pedidos)
    {
        $this->listaItens = $pedidos;
    }
}
