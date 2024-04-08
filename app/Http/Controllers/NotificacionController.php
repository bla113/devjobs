<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;
   

        //LIMPIAR LAS NOTIFICAIONES
       
        auth()->user()->unreadNotifications->markAsRead();
        
        return view('notificaciones.index',[
        
        ]
    );
    }
}
