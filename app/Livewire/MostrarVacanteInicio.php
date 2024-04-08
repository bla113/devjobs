<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;

class MostrarVacanteInicio extends Component
{
    public $salario;
    public $categoria;
    public $buscar;

  

    public function buscarVacante(){
    

        $categorias = Categoria::all();
         $salarios = Salario::all();


         $vacantes = Vacante::where('categoria_id', '=', $this->categoria)
         ->orWhere('salario_id','=',$this->salario)
        
         ->get();

         //dd( $vacantes );
         //$this->emitUp('render');
         return view('livewire.mostrar-vacante-inicio', ['vacantes' => $vacantes,'salarios'=>$salarios,'categorias'=>$categorias]);

    }
    public function render()
    {
        
        $categorias = Categoria::all();

        $salarios = Salario::all();

        
        $vacantes  = Vacante::paginate(10);
        return view('livewire.mostrar-vacante-inicio',['vacantes'=>$vacantes,'salarios'=>$salarios,'categorias'=>$categorias]);
    }
}
