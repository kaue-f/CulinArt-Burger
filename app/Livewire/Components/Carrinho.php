<?php

namespace App\Livewire\Components;

use App\DTOs\ItensDTO;
use App\Models\Cardapio;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Session\Session;

class Carrinho extends Component
{
    private ItensDTO $itensDTO;
    public $lista;
    public $count;

    public $total;
    public $valor;
    #[On("atualizar")]
    public function render(Session $session)
    {
        $this->lista = (array)$session->get("pedidos");

        $this->total = 0;
        try {
            $this->count = count($this->lista["listaItens"]);

            if (isNullOrEmpty($this->valor)) {
                foreach ($this->lista["listaItens"] as $key => $value) {
                    $this->total = $this->total + $value["valor"];
                }
            } else {
                $this->total = $this->total - $this->valor;
                $this->valor = "";
            }
        } catch (\Throwable $th) {
            $this->count = 0;
            $this->valor = 0;
        }

        return view('livewire.components.carrinho', ['lista' => $this->lista]);
    }

    public function boot(Session $session)
    {
        //$this->itensDTO = new ItensDTO((array)$session->get("pedidos"));
    }

    public function remove(Session $session, $key)
    {
        $this->valor = $this->lista["listaItens"][$key]["valor"];
        unset($this->lista["listaItens"][$key]);
        $session->remove("pedidos");
        $session->set("pedidos", new ItensDTO($this->lista["listaItens"]));
        $this->dispatch("atualizar");
        Toaster::error("Item Removido ao seu Carrinho!");
    }

    public function finalizar()
    {
    }
}
