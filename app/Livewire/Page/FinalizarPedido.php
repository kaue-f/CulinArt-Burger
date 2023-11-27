<?php

namespace App\Livewire\Page;

use App\DTOs\FinalizarPedidoDTO;
use App\DTOs\PedidoDTO;
use App\Http\Controllers\Pedidos\RegistrarPedido;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Session\Session;

class FinalizarPedido extends Component
{
    private Session $session;
    public $pedidos;
    public $user;
    public $total;
    public $countItens;
    public $deletado;
    public $finalizarPedidoDTO;
    public $cep;
    public $rua;
    public array $lista;
    #[Rule([
        "finalizarPedidoDTO.pagamento" => "required",
        "cep" => "required|min:9",
        "rua" => "required|min:3|max:60",

    ], message: [
        "required" => "Campo Obrigatório!.",
        "finalizarPedidoDTO.pagamento.required" => "É necessário optar por um meio de pagamento.",
        "min" => "Campo deve conter no mínimo 3 caracteres.",
        "cep.min" => "CEP inválido.",
        "rua.max" => "Campo deve conter no máximo 60 caracteres.",
    ])]

    #[On("atualizarPedidos")]
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
        $this->user = $this->user["user"];

        $this->countItens = count($this->pedidos["listaItens"]);
        if ($this->countItens == 0) {
            redirect()->route("dashboard")
                ->warning("Seu carrinho está vazio!");
        }

        $this->total = 0;
        foreach ($this->pedidos["listaItens"] as $key => $value) {
            $this->total = $this->total + $value["valor"];
        }

        if ($this->countItens >= 5) {
            $this->finalizarPedidoDTO["valorTotal"] = $this->total + 6 - 5;
        } else {
            $this->finalizarPedidoDTO["valorTotal"] = $this->total + 6;
        }

        return view('livewire.page.finalizar-pedido', ['pedidos' => $this->pedidos]);
    }
    public function boot()
    {
        $this->session = new Session;
        if (isNullOrEmpty($this->session->get("pedidos"))) {
            return redirect()->route("dashboard");
        }
    }

    public function mount()
    {
        $this->finalizarPedidoDTO = (array) new FinalizarPedidoDTO();
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

    public function finalizarPedido(RegistrarPedido $registrarPedido)
    {
        $this->validate();
        $this->finalizarPedidoDTO["endereco"] = "CEP: " . $this->cep . " - Endereço: " . $this->rua;
        $this->finalizarPedidoDTO["idUser"] = $this->user["id"];

        $numero = 0;
        foreach ($this->pedidos["listaItens"] as $value) {
            $numero++;
            $this->lista[$numero] = $value["id"]; // . " - " . $value["valor"];
        }
        $this->finalizarPedidoDTO["itens"] = json_encode($this->lista);

        $pedido = $registrarPedido->registar($this->finalizarPedidoDTO);
        if ($pedido === 0) {
            return redirect()->route("dashboard")
                ->error("Ops, Parece que Algo deu Errado com Seu Pedido. Tente Novamente em Breve. ");
        } else {
            $this->session->remove("pedidos");
            $this->session->set("idPedido", new PedidoDTO($pedido["id"]));
            return redirect()->route("pedido")
                ->success("O Pedido Foi Efetuado com Sucesso! Agradecemos por Optar pelos Nossos Produtos.");
        }
    }

    public function cancelarCompra()
    {
        $this->session->remove("pedidos");
        return redirect()->route("dashboard")
            ->warning("Compra Cancelada com sucesso!");
    }
}
