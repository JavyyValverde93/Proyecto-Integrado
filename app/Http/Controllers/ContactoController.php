<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'id_user'=>'required',
                'telefono'=>'integer',
                'instagram'=>'string',
                'youtube'=>'string',
                'correo'=>'string',
                'twitter'=>'string',
                'facebook'=>'string'
            ]);
            $contacto = new Contacto();
            $contacto->id_user = $request->id_user;
            $contacto->telefono = $request->telefono;
            $contacto->instagram = $request->instagram;
            $contacto->youtube = $request->youtube;
            $contacto->correo = $request->correo;
            $contacto->twitter = $request->twitter;
            $contacto->facebook = $request->facebook;

            $contacto->save();

            return back()->with('mensaje', 'Datos de contacto creados correctamente');

        }catch(\Exception $ex){
            return back()->with('error', 'Ha habido algún error al rellenar los campos de contacto');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
