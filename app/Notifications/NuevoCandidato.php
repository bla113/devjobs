<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    

    Public $usuario_id;
    Public $nombre_vacante;
    Public $id_vacante;

    public function __construct($id_vacante,$nombre_vacante,$usuario_id)// la infomacion queremos que reciba y envie construimos
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;

    }

  
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        $url= url("/candidatos/".$this->id_vacante);
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('La vacante es: '.$this->nombre_vacante)
                    ->action('Ver notificaciones',  $url)
                    ->line('Gracias por utilizar DevJobs!');
    }


    //Almacena la nostifiaciones en la BD
    public function toDatabase( $notifiable){
        return [
            'id_vacante'=>$this->id_vacante,
            'nombre_vacante'=>$this->nombre_vacante,
            'user_id'=>$this->usuario_id,
        ];
    }
}
