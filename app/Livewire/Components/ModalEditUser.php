<?php

namespace App\Livewire\Components;

use App\DTOs\EditeUserDTO;
use App\DTOs\SessionData;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class ModalEditUser extends Component
{
    private SessionData $sessionData;
    public $editeUserDTO;
    public $password;
    public function render()
    {
        return view('livewire.components.modal-edit-user');
    }

    public function mount(Session $session)
    {
        $this->sessionData = SessionData::getSession($session);

        $this->editeUserDTO = (array) new EditeUserDTO;
        $this->editeUserDTO["nome"] = $this->sessionData->user["nome"];
        $this->editeUserDTO["sobrenome"] = $this->sessionData->user["sobrenome"];
        $this->editeUserDTO["email"] = $this->sessionData->user["email"];
        $this->editeUserDTO["cpf"] = $this->sessionData->user["cpf"];
        $this->editeUserDTO["telefone"] = $this->sessionData->user["telefone"];
    }
}
