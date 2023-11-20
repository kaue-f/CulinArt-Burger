<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "usuarios";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "nome",
        "sobrenome",
        "email",
        "cpf",
        "telefone",
        "senha",
        "status",
        "sessao",
        "created_at",
    ];
}
