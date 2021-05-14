<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContacto;
use App\Mail\FormularioSugerencia;

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

    public function sugerencia(Request $request){
        $mensaje = $request->validate([
            'mensaje'=>'required|min:6'
        ]);

            //->queue or ->send
        Mail::to('valverdepruebas93@gmail.com')->queue(new FormularioSugerencia($mensaje));

        return back()->with('mensaje', 'El correo se ha enviado correctamente');
    }
}
