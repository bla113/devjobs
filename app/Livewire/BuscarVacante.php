<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class BuscarVacante extends Component


{

    public $salario;
    public $categoria;
    public $palabra;

    public function buscarVacante(){
        
        $this->emit('termminosBusqueda');

    }

    public function render()
    {

        $categorias = Categoria::all();

        $salarios = Salario::all();


        return view('livewire.buscar-vacante',['categorias'=>$categorias,'salarios'=>$salarios]);
    }
}
