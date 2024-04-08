<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
class EditarVacante extends Component
{

    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024',
    ];


    public function mount(Vacante $vacante)// se instancia por que se esta pasando desde el hook 
    {
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->descripcion = $vacante->descripcion;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d') ;
        $this->imagen = $vacante->imagen;
        $this->vacante_id = $vacante->id;

    }

    public function editarVacante(){
        $datos = $this->validate(); //validar los campos
        // Si hay una nueva imagen

        if($this->imagen_nueva){
            //Storage::disk('public')->delete($this->imagen);
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', "", $imagen); // dehja solo el nombre de la imagen

        }

        //Encontar la vacante a esditar
        $vacante = Vacante::find($this->vacante_id);

        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen ;

        $vacante->save();
        
        //Asignar los valores 

        //Guardar la vacante
        //redireccionar
        session()->flash('mensaje', 'La vacante se editó correctamente');
        return redirect()->route('vacantes.index');
    }


    public function render()
    {

        $salarios = Salario::all();
        $categirias = Categoria::all();
        
        return view('livewire.editar-vacante', ['salarios' => $salarios, 'categorias' => $categirias]);
    }

    
   
  
}
