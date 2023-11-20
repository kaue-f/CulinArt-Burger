<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $table = "pedidos";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "id_usuario",
        "itens",
        "valor_total",
        "endereco",
        "pagamento",
        "status",
        "created_at",
    ];
}
