<?php

namespace App\Http\Controllers\Pedidos;

use App\Models\Pedidos;

class CheckPedido
{
    public function check($id)
    {
        Pedidos::find($id)
            ->update([
                "status" => true,
            ]);

    }
}