<?php

namespace App\Livewire\Components;

use App\DTOs\SessionData;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class Navbar extends Component
{
    private SessionData $sessionData;
    public function render()
    {
        return view('livewire.components.navbar');
    }

    public function mount(Session $session)
    {
        //$session->remove("data");
        $this->sessionData = SessionData::getSession($session);
        if (isNullOrEmpty($this->sessionData)) {
            return redirect()->route('login');
        }
    }
}
