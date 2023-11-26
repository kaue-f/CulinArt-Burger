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
    public $lista;
    public $count;
    public $total;
    public $deletado;
    #[On("atualizar")]
    public function render(Session $session)
    {
        if ($this->deletado == true) {
            $this->lista;
            $this->deletado = false;
        } else {
            $this->lista = json_decode(json_encode($session->get("pedidos")), true);
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

    public function remove(Session $session, $key)
    {
        $itens = $session->get("pedidos");
        unset($itens->listaItens[$key]);
        $this->lista = (array) $itens;
        $this->deletado = true;
        $this->dispatch("atualizar");
        $this->dispatch("atualizarPedidos");
        Toaster::error("Item Removido ao seu Carrinho!");
    }

    public function finalizar()
    {
        if ($this->count >= 5) {
            return redirect()->route("finalizar");
        } else {
            return redirect()->route("finalizar")
                ->success("Aproveite esta oferta especial: um cupom de desconto de R$5,00
                            aguarda por você na compra de 5 itens ou mais itens.");
        }
    }
}
