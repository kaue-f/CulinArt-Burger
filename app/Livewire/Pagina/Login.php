<?php

namespace App\Livewire\Pagina;

use App\DTOs\CadastrarUserDTO;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $cadastrarUserDTO;

    #[Layout("livewire.layouts.layout-login")]
    public function render()
    {
        return view('livewire.pagina.login');
    }

    public function mount()
    {
        $this->cadastrarUserDTO = (array) new CadastrarUserDTO();
    }

    public function logged()
    {
        //dd("oiu");
    }

    public function register()
    {
        dd($this->cadastrarUserDTO);
    }
}
