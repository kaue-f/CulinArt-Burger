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
        //dd($this->listaItens, "!@");
    }

    /*
    public static function getPedidos(Session $session)
    {
        $lista = $session->get("pedidos");
        if (isNullOrEmpty($lista)) {
            $session->remove("pedidos");
        }
        return new ItensDTO($lista->listaItens);
    }
    */
}
