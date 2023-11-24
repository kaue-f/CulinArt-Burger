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
    public $deletado;
    #[On("atualizar")]
    public function render(Session $session)
    {
        //$session->remove("pedidos");
        if ($this->deletado == true) {
            //dd($this->lista);
            $this->lista;
            $this->deletado = false;
        } else {
            $this->lista = json_decode(json_encode($session->get("pedidos")), true);
            //dd($this->lista);

        }

        $this->total = 0;
        try {
            $this->count = count($this->lista["listaItens"]);
            foreach ($this->lista["listaItens"] as $key => $value) {
                $this->total = $this->total + $value["valor"];
            }

        } catch (\Throwable $th) {
            $this->count = 0;
        }

        return view('livewire.components.carrinho', ['lista' => $this->lista]);
    }

    public function boot(Session $session)
    {
        //$this->itensDTO = new ItensDTO((array)$session->get("pedidos"));
    }

    public function remove(Session $session, $key)
    {
        $itens = $session->get("pedidos");
        unset($itens->listaItens[$key]);
        $this->lista = (array) $itens;
        $this->deletado = true;
        $this->dispatch("atualizar");
        Toaster::error("Item Removido ao seu Carrinho!");
    }

    public function finalizar()
    {
    }
}
;