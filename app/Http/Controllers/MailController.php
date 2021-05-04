<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContacto;

class MailController extends Controller
{
    public function store(Request $request){
        $mensaje = $request->validate([
            'prodname'=>'required',
            'idprod'=>'required',
            'correo'=>'required',
            'mensaje'=>'required|min:6'
        ]);

        $correo = $request->correo;
        $mensaje['producto_nombre'] = $request->prodname;
        $mensaje['id'] = $request->idprod;
            //->queue or ->send
        Mail::to($correo)->queue(new FormularioContacto($mensaje));

        return back()->with('mensaje', 'El correo se ha enviado correctamente');
    }
}
