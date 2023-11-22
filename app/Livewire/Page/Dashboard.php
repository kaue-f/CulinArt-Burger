<?php

namespace App\Livewire\Page;

use App\DTOs\SessionData;
use App\Models\Cardapio;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\Session\Session;

class Dashboard extends Component
{
    use WithPagination;
    public $item;

    #[Title("Dashboard")]
    #[Layout("livewire.layouts.layout")]
    public function render()
    {
        return view('livewire.page.dashboard');
    }

    public function mount()
    {
        $this->item = Cardapio::get();
        //dd($this->item[0]["item"]);
    }
}
