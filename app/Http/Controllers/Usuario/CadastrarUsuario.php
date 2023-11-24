<?php

namespace App\Http\Controllers\Usuario;


use App\Http\Controllers\Controller;
use App\Models\User;


class CadastrarUsuario extends Controller
{
    public function cadastrar(array $cadastrarUserDTO)
    {
        $user = User::where("cpf", "=", $cadastrarUserDTO["cpf"])
            ->orWhere("email", "=", $cadastrarUserDTO["email"])
            ->first();

        if (isset($user)) {
            if ($user->cpf == $cadastrarUserDTO["cpf"] && $user->status == true) {
                $erro = "CPF já está em uso";
                return $erro;
            }
            if ($user->email == $cadastrarUserDTO["email"] && $user->status == true) {
                $erro = "Email já está em uso";
                return $erro;
            }
        }

        try {
            $new = new User();
            $new->nome = $cadastrarUserDTO["nome"];
            $new->sobrenome = $cadastrarUserDTO["sobrenome"];
            $new->email = $cadastrarUserDTO["email"];
            $new->cpf = $cadastrarUserDTO["cpf"];
            $new->telefone = $cadastrarUserDTO["telefone"];
            $new->senha = md5($cadastrarUserDTO["senha"]);
            $new->status = true;
            $new->save();
            return 0;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
