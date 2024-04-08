<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante ;
    use WithFileUploads;
    protected $rules =[
        'cv'=>'required|mimes:pdf'
    ];

    public function postularme(){
        $this->validate();

        //alamcenar cv 
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', "",  $cv); // dehja solo el nombre de la imagen
        //crear la postulacion
        $this->vacante->candidatos()->create([
            'user_id'=>auth()->user()->id,
            'cv'=>$datos['cv'],
        ]);

        // crear una notificacion y enviar un email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo,auth()->user()->id));


        //  mostrar mensaje al usuario
        session()->flash('mensaje', 'Se envió correctamente tu información');
        return redirect()->to('vacantes/'.$this->vacante->id);
        return redirect()->back();
        //return redirect()->to('/contact-form-success');
    }

    public function mount(Vacante $vacante){
        //dd($vacante);
        $this->vacante= $vacante;
    }
    public function render()
    {

        return view('livewire.postular-vacante');
    }


}
