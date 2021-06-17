<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RespuestaController extends Controller
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
        $request->validate([
            'respuesta'=>'required|max:150',
            'idc'=>'required',
            'idu'=>'required',
            'idp'=>'required'
        ],[
            'respuesta.required' => 'No se ha escrito ninguna respuesta',
        ]);

        try{

            $respuesta = new Respuesta();
            $respuesta->respuesta = $request->respuesta;

            $respuesta->comentario_id = $request->idc;
            $respuesta->producto_id = $request->idp;
            $respuesta->user_id = $request->idu;

            $respuesta->save();

            return back()->with('mensaje', "Comentario respondido correctamente");
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido responder al comentario');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Respuesta $respuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuesta $respuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respuesta $respuesta)
    {
        if(Auth::user()->id==$respuesta->user_id || Auth::user()->tipo==1){
            try{
                $respuesta->delete();
                return back()->with('mensaje', 'Respuesta eliminada correctamente');
            }catch(\Exception $ex){
                return back()->with('error', 'No se ha podido eliminar la respuesta');
            }
        }else{
            return back();
        }
    }
}
