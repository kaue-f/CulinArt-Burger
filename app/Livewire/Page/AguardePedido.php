<?php

namespace App\Livewire\Page;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class AguardePedido extends Component
{
    public $id;
    #[Title("Pedido")]
    #[Layout("livewire.layouts.layout")]
    public function render()
    {
        return view('livewire.page.aguarde-pedido');
    }

    public function boot()
    {
        if (isNullOrEmpty($idPedido)) {
            return redirect()->route("dashboard");
        } else {
            $this->id = $idPedido;
        }
    }
}
