<?php

namespace App\Http\Controllers\Usuario;

use App\DTOs\SessionData;
use App\Models\User;
use Symfony\Component\HttpFoundation\Session\Session;

class EditarUser
{
    public function updateUser(array $editeUserDTO, Session $session)
    {
        $user = User::find($editeUserDTO["id"]);
        $erro = "Erro ao atualizar usuário";

        if (isNullOrEmpty($user)) {
            return $erro;
        }
        try {
            User::find($editeUserDTO["id"])
                ->update([
                    "email" => (isset($editeUserDTO["email"])) ? $editeUserDTO["email"] : $user["email"],
                    "telefone" => (isset($editeUserDTO["telefone"])) ? $editeUserDTO["telefone"] : $user["telefone"],
                    "senha" => (isset($editeUserDTO["senha"])) ? md5($editeUserDTO["senha"]) : $user["senha"],
                ]);

            $session->set("data", new SessionData(User::find($editeUserDTO["id"])));
            return 0;
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return $erro . " - " . $th->getMessage();
        }
    }

    public function deleteUser($id, $password)
    {
        $user = User::find($id);
        $erro = "Não foi possível deletar o usuario";

        if (isNullOrEmpty($user)) {
            return $erro;
        }
        try {
            if (md5($password) === $user["senha"]) {
                User::find($id)
                    ->update([
                        "status" => false,
                    ]);
                return 0;
            } else {
                $erro = "Senha do usuário inválida";
                return $erro;
            }
        } catch (\Throwable $th) {
            return $erro . " - " . $th->getMessage();
        }
    }
}