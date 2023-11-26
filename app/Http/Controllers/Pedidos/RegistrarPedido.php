<?php

namespace App\Http\Controllers\Pedidos;

use App\Http\Controllers\Controller;
use App\Models\Pedidos;

class RegistrarPedido extends Controller
{
    public function registar(array $finalizarPedidoDTO)
    {
        try {
            $pedido = new Pedidos();

            $pedido->id_usuario = $finalizarPedidoDTO["idUser"];
            $pedido->itens = $finalizarPedidoDTO["itens"];
            $pedido->valor_total = $finalizarPedidoDTO["valorTotal"];
            $pedido->endereco = $finalizarPedidoDTO["endereco"];
            $pedido->pagamento = $finalizarPedidoDTO["pagamento"];

            $pedido->save();
            $pedidoId = $pedido->id;

            return $pedidoId;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
