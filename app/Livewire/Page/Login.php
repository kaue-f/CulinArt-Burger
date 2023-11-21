<?php

namespace App\Livewire\Page;

use App\DTOs\CadastrarUserDTO;
use App\DTOs\LoginDTO;
use App\DTOs\SessionData;
use App\Http\Controllers\Login\CadastrarUsuario;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Masmerise\Toaster\Toastable;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Session\Session;

class Login extends Component
{
    use Toastable;
    public $cadastrarUserDTO;
    public $loginDTO;
    public $password;

    #[Rule([
        "cadastrarUserDTO.nome" => "required|min:3|max:20",
        "cadastrarUserDTO.sobrenome" => "required|min:3|max:50",
        "cadastrarUserDTO.email" => "required|email",
        "cadastrarUserDTO.cpf" => "required",
        "cadastrarUserDTO.telefone" => "required",
        "cadastrarUserDTO.senha" => "required|min:3|max:20",
        "password" => "required|same:cadastrarUserDTO.senha|min:3|max:20",
    ], message: [
        "required" => "Campo Obrigatório!",
        "email" => "Email em formato inválido",
        "password" => "Senha não coincidem",
        "min" => "Campo deve conter no mínimo 3 caracteres",
        "cadastrarUserDTO.nome.max" => "Campo deve conter no máximo 20 caracteres",
        "cadastrarUserDTO.sobrenome.max" => "Campo deve conter no máximo 50 caracteres",
        "cadastrarUserDTO.senha.max" => "Campo deve conter no máximo 20 caracteres",
        "passwor.max" => "Campo deve conter no máximo 20 caracteres",
    ])]

    #[Layout("livewire.layouts.layout-login")]
    public function render()
    {
        return view('livewire.page.login');
    }

    public function mount(Session $session)
    {
        $this->cadastrarUserDTO = (array) new CadastrarUserDTO();
        $this->loginDTO = (array) new LoginDTO;

        try {
            if ($session->has("data")) {
                $data = SessionData::getSession($session);
                if (!isNullOrEmpty($data->user)) {
                    return redirect()->route("dashboard");
                }
            }
        } catch (\Throwable $th) {
            Toaster::error("Erro ao realizar o login");
        }
    }

    public function logged(Session $session)
    {
        $user = User::where([
            ["email", "=", $this->loginDTO["login"]],
            ["status", "=", true]
        ])->first();

        if (empty($user)) {
            Toaster::error("Usuário não Cadastrado");
        } else {
            if ($user->senha == md5($this->loginDTO["senha"])) {
                //dd($user->nome);
                $session->remove("data");
                $session->set("data", new SessionData($user));
                return redirect("dashboard")
                    ->success("Seja Bem-Vindo, " + $user->nome + " !");
            } else {
                Toaster::warning("Senha Inválida");
            }
        }
    }

    public function register(CadastrarUsuario $cadastrarUsuario)
    {
        $this->validate();
        try {
            $register = $cadastrarUsuario->cadastrar($this->cadastrarUserDTO);
            if ($register == 0) {
                redirect()->route("login")
                    ->success("Usuário Cadastrado com Sucesso!");
            } else {
                dd($register);
                Toaster::warning($register);
            }
        } catch (\Throwable $th) {
            redirect()->route("login")
                ->error($th->getMessage());
        }
    }
}
