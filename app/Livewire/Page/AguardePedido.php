<?php

namespace App\Livewire\Page;

use App\Http\Controllers\Pedidos\CheckPedido;
use App\Http\Controllers\Pedidos\ListaItens;
use App\Http\Controllers\Pedidos\TempoPedido;
use App\Models\Cardapio;
use App\Models\Pedidos;
use DateInterval;
use DateTime;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class AguardePedido extends Component
{
    private Session $session;
    public $id;
    public $dados;
    public array $pedidos;
    public $count;
    public $tempo;
    public $t;

    #[Title("Pedido")]
    #[Layout("livewire.layouts.layout")]
    public function render(ListaItens $listaItens, TempoPedido $tempoPedido)
    {
        $this->dados = Pedidos::find($this->id);
        $this->dados["id_itens"] = json_decode($this->dados["id_itens"], true);

        $this->count["valor"] = 0;
        foreach ($this->dados["id_itens"] as $key => $value) {
            $this->pedidos[$key] = $listaItens->lista($value);
            $this->count["valor"] = $this->pedidos[$key]["valor"] + $this->count["valor"];
        }
        $this->count["itens"] = count($this->pedidos);

        if ($this->dados["status"] == true) {
            $this->t = 4;
            $this->tempo = $tempoPedido->calcular($this->id);
        } else {
            $this->dispatch("tempoPedido");
        }

        return view('livewire.page.aguarde-pedido');
    }

    public function boot(Session $session)
    {
        $this->session = $session;
        if (isNullOrEmpty($this->session->get("idPedido"))) {
            return redirect()->route("dashboard");
        }
        $this->id = $this->session->get("idPedido")->id;
    }

    #[On("tempoPedido")]
    public function temp(TempoPedido $tempoPedido, CheckPedido $checkPedido)
    {
        $this->tempo = $tempoPedido->calcular($this->id);

        $tempAtual = new DateTime();
        $tempAtual = $tempAtual->format('d/m/Y H:i:s');

        if ($tempAtual > $this->tempo["recebido"]) {
            $this->t = 1;
        }
        if ($tempAtual > $this->tempo["preparo"]) {
            $this->t = 2;
        }
        if ($tempAtual > $this->tempo["breve"]) {
            $this->t = 3;
        }
        if ($tempAtual > $this->tempo["sucesso"]) {
            $this->t = 4;
            $checkPedido->check($this->id);
            sleep(120);
            return redirect()->route("dashboard")
                ->success("A Entrega do Seu Pedido Foi Concluída com Sucesso.");
        }
    }
}
