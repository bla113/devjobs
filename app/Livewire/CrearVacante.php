<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        // Alamacenar imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', "", $imagen); // dehja solo el nombre de la imagen

        //dd($datos['titulo']);

        //  Crear Vacante

        Vacante::create([

            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'imagen' => $datos['imagen'],
            'descripcion' => $datos['descripcion'],
            'user_id' => auth()->user()->id
        ]);

        // Crear un mensaje

        session()->flash('mensaje', 'La vacante se publico correctamente');

        return redirect()->route('vacantes.index');
        //return redirect()->to('/vacantes');
    }
    public function render()
    {
        $salarios = Salario::all();
        $categirias = Categoria::all();
        return view('livewire.crear-vacante', ['salarios' => $salarios, 'categorias' => $categirias]);
    }
}
