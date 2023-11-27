<?php

namespace App\Livewire\Page;

use App\Http\Controllers\Pedidos\ListaItens;
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
    public  array $tempo;
    public $t;

    #[Title("Pedido")]
    #[Layout("livewire.layouts.layout")]
    public function render(ListaItens $listaItens)
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
        } else {
            //$this->dispatch("tempoPedido", $this->dados['created_at']);
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
    public function temp($temp)
    {
        //$temp = new DateTime($temp);
        $intervalRecebido = new DateInterval('PT1M');
        $intervalPreparo = new DateInterval('PT3M');
        $intervalBreve = new DateInterval('PT40M');
        $intervalSucesso = new DateInterval('PT1H');

        $tempAtual = new DateTime();

        $this->tempo["recebido"] = $temp->add($intervalRecebido);
        $this->tempo["preparo"] = $temp->add($intervalPreparo);
        $this->tempo["breve"] = $temp->add($intervalBreve);
        $this->tempo["sucesso"] = $temp->add($intervalSucesso);

        dd($temp, $this->tempo);

        if ($this->tempo["recebido"] >= $tempAtual) {
            $this->t = 1;
        }
        if ($this->tempo["preparo"] >= $tempAtual) {
            $this->t = 2;
        }
        if ($this->tempo["breve"] >= $tempAtual) {
            $this->t = 3;
        }
        if ($this->tempo["sucesso"] >= $tempAtual) {
            $this->t = 4;
        }
    }
}
