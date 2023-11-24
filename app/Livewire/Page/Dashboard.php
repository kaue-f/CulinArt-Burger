<?php

namespace App\Livewire\Page;

use App\DTOs\ItensDTO;
use App\Models\Cardapio;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Session\Session;

class Dashboard extends Component
{
    public $item;
    public $search;
    public array $pedidos;
    public $numerPedidos = 0;

    #[Title("Dashboard")]
    #[Layout("livewire.layouts.layout")]
    public function render()
    {
        if (isNullOrEmpty($this->search)) {
            $this->item = Cardapio::get();
        } else {
            $this->item = Cardapio::where("item", 'LIKE', "%{$this->search}%")->get();
        }

        return view('livewire.page.dashboard', ["itens" => $this->item]);
    }

    public function selectItem(
        $idItem,
        Session $session,
    ) {
        $item = Cardapio::find($idItem);
        $this->numerPedidos++;
        $this->pedidos[$this->numerPedidos] = $item;
        $session->set("pedidos", new ItensDTO($this->pedidos));
        $this->dispatch("atualizar");
        Toaster::success("Item Adicionado ao seu Carrinho!");
    }
}
