<?php

namespace App\Livewire\Components;

use App\DTOs\SessionData;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Session\Session;

class Navbar extends Component
{
    private SessionData $sessionData;
    private Session $session;
    public $nome;
    public function render()
    {
        return view('livewire.components.navbar');
    }

    public function boot(Session $session)
    {
        try {
            $this->sessionData = SessionData::getSession($session);
            $this->session = $session;
        } catch (\Throwable $th) {
            return redirect()->route('login');
        }

        $this->nome = $this->sessionData->user["nome"];
    }

    public function logout()
    {
        try {
            $this->session->remove("data");
            return redirect()->route("login")
                ->success("Volte Sempre, " . $this->nome . "!");
        } catch (\Throwable $th) {
            return redirect()->route("dashboard")
                ->error("Erro no logout");
        }
    }
}
