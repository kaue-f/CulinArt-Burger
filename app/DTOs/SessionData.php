<?php

namespace App\DTOs;

use App\Models\User;
use Symfony\Component\HttpFoundation\Session\Session;

class SessionData
{
    public User $user;
    public bool $logged;
    public function __construct($user)
    {
        $this->user = new User();

        $this->user->id = $user->id;
        $this->user->nome = $user->nome;
        $this->user->sobrenome = $user->sobrenome;
        $this->user->email = $user->email;
        $this->user->cpf = $user->cpf;
        $this->user->telefone = $user->telefone;
        $this->user->senha = $user->senha;
        $this->user->status = $user->status;
        $this->user->sessao = $user->sessao;
        $this->user->logged = true;
    }

    public static function getSession(Session $session)
    {
        $sessionData = $session->get("data");
        if (isNullOrEmpty($sessionData)) {
            return redirect()->route("login");
        }

        return new SessionData($sessionData->user);
    }
}