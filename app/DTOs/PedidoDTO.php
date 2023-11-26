<?php

namespace App\DTOs;

class PedidoDTO
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
