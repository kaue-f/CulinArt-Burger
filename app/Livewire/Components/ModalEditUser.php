<?php

namespace App\Livewire\Components;

use App\DTOs\EditeUserDTO;
use App\DTOs\SessionData;
use App\Http\Controllers\Usuario\EditarUser;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Session\Session;

class ModalEditUser extends Component
{
    private SessionData $sessionData;
    public $editeUserDTO;
    public $password;
    public $deletePassword;
    #[Rule([
        "editeUserDTO.email" => "email",
        "editeUserDTO.telefone" => "required",
        "editeUserDTO.senha" => "max:20",
        "password" => "same:editeUserDTO.senha|max:20",
    ], message: [
        "required" => "Campo Obrigatório!",
        "email" => "Email em formato inválido",
        "password" => "Senha não coincidem",
        "min" => "Campo deve conter no mínimo 3 caracteres",
        "max" => "Campo deve conter no máximo 20 caracteres",
    ])]
    public function render(Session $session)
    {
        $this->sessionData = SessionData::getSession($session);
        $this->editeUserDTO = (array) new EditeUserDTO;
        $this->editeUserDTO["id"] = $this->sessionData->user["id"];
        $this->editeUserDTO["nome"] = $this->sessionData->user["nome"];
        $this->editeUserDTO["sobrenome"] = $this->sessionData->user["sobrenome"];
        $this->editeUserDTO["email"] = $this->sessionData->user["email"];
        $this->editeUserDTO["cpf"] = $this->sessionData->user["cpf"];
        $this->editeUserDTO["telefone"] = $this->sessionData->user["telefone"];
        return view('livewire.components.modal-edit-user');
    }

    public function edite(EditarUser $editarUser, Session $session)
    {
        $this->validate();
        try {
            $edit = $editarUser->updateUser($this->editeUserDTO, $session);
            $this->js("onclick(editUser.close())");
            if ($edit == 0) {
                Toaster::success("Usuário Editado com Sucesso!");
            } else {
                Toaster::warning($edit);
            }
        } catch (\Throwable $th) {
            $this->js("onclick(editUser.close())");
            dd($th->getMessage());
            Toaster::error($th->getMessage());
        }
    }

    public function delete($id, EditarUser $editarUser, Session $session)
    {
        try {
            $result = $editarUser->deleteUser($id, $this->deletePassword);
            $this->js("onclick(deleteUser.close())");
            $this->js("onclick(editUser.close())");
            if ($result == 0) {
                $session->remove("pedidos");
                $session->remove("data");
                redirect()->route("login")
                    ->warning("Usuário Deletado com Sucesso!")
                    ->success("Se a fome bater ou mudar de ideia, já sabe, estamos por aqui!");
            } else {
                Toaster::warning($result);
            }
        } catch (\Throwable $th) {
            $this->js("onclick(deleteUser.close())");
            $this->js("onclick(editUser.close())");
            Toaster::error($th->getMessage());
        }
    }
}
