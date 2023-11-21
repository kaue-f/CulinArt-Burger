<?php

namespace App\Livewire\Pagina;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout("livewire.layouts.layout")]
    public function render()
    {
        return view('livewire.pagina.dashboard');
    }
}
