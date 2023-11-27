<?php

namespace App\Http\Controllers\Pedidos;

use App\Models\Cardapio;

class ListaItens
{
    public array $lista;
    public function lista($id)
    {
        $item = Cardapio::find($id);
        $this->lista["item"] = $item["item"];
        $this->lista["valor"] = $item["valor"];

        return $this->lista;
    }
}
