<?php

namespace App\Livewire\Page;

use App\DTOs\SessionData;
use App\Models\Pedidos;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class ListaPedidos extends Component
{
    public SessionData $sessionData;
    public $listaPedidos;
    #[Title("Finalizar Pedido")]
    #[Layout("livewire.layouts.layout")]
    public function render(Session $session)
    {
        $this->sessionData = SessionData::getSession($session);
        $id = $this->sessionData->user["id"];
        $this->listaPedidos = Pedidos::where([
            ["id_usuario", "=", $id]
        ])->select("id", "created_at", "pagamento", "valor_total", "status")->get();

        dd($this->listaPedidos, $this->sessionData);
        return view('livewire.page.lista-pedidos');
    }
}
