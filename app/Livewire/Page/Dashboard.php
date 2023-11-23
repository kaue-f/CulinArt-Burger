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
        foreach ($this->item as $value) {
            switch ($value["categoria"]) {
                case 1:
                    $value["categoria"] = "Burgers";
                    break;
                case 2:
                    $value["categoria"] = "Burgers Veganos e Vegetarianos";
                    break;
                case 3:
                    $value["categoria"] = "Acompanhamentos";
                    break;
                case 4:
                    $value["categoria"] = "Sobremesas";
                    break;
                case 5:
                    $value["categoria"] = "Bebidas";
                    break;
            }
        }
    }
}
