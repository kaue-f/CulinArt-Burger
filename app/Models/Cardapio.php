<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;
    protected $table = "cardapio";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "item",
        "imagem",
        "valor",
        "descricao",
        "categoria",
        "disponivel",
        "created_at",
    ];
}
