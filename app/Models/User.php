<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, HasUuids;
    protected $table = "usuarios";
    protected $primaryKey = "id";
    protected $keyType = 'string';
    protected $fillable = [
        "id",
        "nome",
        "sobrenome",
        "email",
        "cpf",
        "telefone",
        "senha",
        "status",
        "created_at",
    ];
}
