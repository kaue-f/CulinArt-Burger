<?php

namespace App\Livewire\Page;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Session\Session;

class FinalizarPedido extends Component
{
    private Session $session;
    public $pedidos;
    public $user;
    public $valorTotal;
    public $countItens;
    public $deletado;

    #[Title("Finalizar Pedido")]
    #[Layout("livewire.layouts.layout")]
    public function render()
    {
        if ($this->deletado == true) {
            $this->pedidos;
            $this->deletado = false;
        } else {
            $this->pedidos = json_decode(json_encode($this->session->get("pedidos")), true);
        }

        $this->user = json_decode(json_encode($this->session->get("data")), true);
        $this->countItens = count($this->pedidos["listaItens"]);
        $this->valorTotal = 0;
        foreach ($this->pedidos["listaItens"] as $key => $value) {
            $this->valorTotal = $this->valorTotal + $value["valor"];
        }

        return view('livewire.page.finalizar-pedido', ['pedidos' => $this->pedidos, 'user' => $this->user["user"]]);
    }
    public function boot()
    {
        $this->session = new Session;
        $consulta = $this->session->get("pedidos");
        if (isNullOrEmpty($consulta->listaItens)) {
            return redirect()->route("dashboard");
        }
    }

    public function removeItem($key)
    {
        $itens = $this->session->get("pedidos");
        unset($itens->listaItens[$key]);
        $this->pedidos = (array) $itens;
        $this->deletado = true;
        $this->render();
        $this->dispatch("atualizar");
        Toaster::error("Item Removido ao seu Carrinho!");
    }
}
