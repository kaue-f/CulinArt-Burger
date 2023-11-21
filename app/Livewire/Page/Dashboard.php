<?php

namespace App\Livewire\Page;

use App\DTOs\SessionData;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class Dashboard extends Component
{
    private SessionData $sessionData;

    #[Layout("livewire.layouts.layout")]
    public function render()
    {
        return view('livewire.page.dashboard');
    }

    public function mount(Session $session)
    {
        $this->sessionData = SessionData::getSession($session);
    }
}
