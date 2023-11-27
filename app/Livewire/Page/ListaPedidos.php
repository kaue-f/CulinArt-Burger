<?php

namespace App\Livewire\Page;

use App\DTOs\PedidoDTO;
use App\DTOs\SessionData;
use App\Models\Pedidos;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class ListaPedidos extends Component
{
    //public SessionData $sessionData;
    public $listaPedidos = [];
    #[Title("Finalizar Pedido")]
    #[Layout("livewire.layouts.layout")]

    public function render(Session $session)
    {
        $sessionData = SessionData::getSession($session);
        $id = $sessionData->user["id"];
        $listaPedidos = Pedidos::where([
            ["id_usuario", "=", $id]
        ])->paginate(6);

        //  dd($listaPedidos, $this->sessionData);
        return view('livewire.page.lista-pedidos', ["lista" => $listaPedidos]);
    }

    public function pedido($id, Session $session)
    {
        $session->remove("idPedido");
        $session->set("idPedido", new PedidoDTO($id));
        return redirect()->route("pedido");
    }

}
