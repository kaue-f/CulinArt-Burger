<?php

namespace App\DTOs;

class FinalizarPedidoDTO
{
    public string $idUser;
    public string $itens;
    public string $endereco;
    public string $pagamento;
    public float $valorTotal;
}
