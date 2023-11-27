<?php

namespace App\Http\Controllers\Pedidos;

use App\Models\Pedidos;
use DateInterval;

class TempoPedido
{
    public array $tempo;
    public function calcular($id)
    {
        $pedido = Pedidos::find($id);
        $temp = $pedido["created_at"];

        $intervalRecebido = new DateInterval('PT1M');
        $intervalPreparo = new DateInterval('PT3M');
        $intervalBreve = new DateInterval('PT30M');
        $intervalSucesso = new DateInterval('PT50M');

        $recebido = $temp->add($intervalRecebido);
        $this->tempo["recebido"] = $recebido->format('d/m/Y H:i:s');
        $preparo = $temp->add($intervalPreparo);
        $this->tempo["preparo"] = $preparo->format('d/m/Y H:i:s');
        $breve = $temp->add($intervalBreve);
        $this->tempo["breve"] = $breve->format('d/m/Y H:i:s');
        $sucesso = $temp->add($intervalSucesso);
        $this->tempo["sucesso"] = $sucesso->format('d/m/Y H:i:s');

        return $this->tempo;
    }
}