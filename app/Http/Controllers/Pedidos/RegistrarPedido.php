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
            $pedido->id_itens = $finalizarPedidoDTO["itens"];
            $pedido->valor_total = $finalizarPedidoDTO["valorTotal"];
            $pedido->endereco = $finalizarPedidoDTO["endereco"];
            $pedido->pagamento = $finalizarPedidoDTO["pagamento"];
            $pedido->status = false;
            $pedido->save();
            $pedido["id"] = $pedido->id;
            $pedido["tempo"] = $pedido->created_at;

            return $pedido;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
