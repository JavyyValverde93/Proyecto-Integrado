<?php

namespace App\Http\Controllers;

use App\Models\Guardado;
use Illuminate\Http\Request;

class GuardadoController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guardado  $guardado
     * @return \Illuminate\Http\Response
     */
    public function show(Guardado $guardado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guardado  $guardado
     * @return \Illuminate\Http\Response
     */
    public function edit(Guardado $guardado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guardado  $guardado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guardado $guardado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guardado  $guardado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guardado $guardado)
    {
        $guardado->delete();
        return back()->with('mensaje', 'Producto eliminado de favoritos');
    }

    //New funcs

    public function guardar(Request $request, $user){
        $request->validate([
            'ui' => 'required'
        ]);

        $validar = Guardado::where('user_id', $user)->where('producto_id', $request->ui)->first();
        if($validar!=null){
            return back();
        }
        
        try{
            $save = new Guardado();
            $save->producto_id = $request->ui;
            $save->user_id = $user;
            $save->save();
            return back()->with('mensaje', 'Producto añadido a favoritos');

        }catch(\Exception $ex){
            return back()->with('error', 'Error al añadir a favoritos');
        }
    }

    public function quitar(Guardado $guardado){
        $guardado->delete();
        return back()->with('mensaje', 'Producto eliminado de favoritos');
    }
}
