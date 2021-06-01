<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ComentarioController extends Controller
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
                'comentario'=>'required|min:7|max:150',
                'user_id'=>'required',
                'producto_id'=>'required'
            ],[
                'comentario.required' => 'El comentario está vacío',
                'comentario.min' => 'El comentario no supera el mínimo de caracteres',
            ]);
        try{
            $validar = Comentario::where('comentario', $request->comentario)->where('user_id', $request->user_id)
            ->where('producto_id', $request->producto_id)->first();
            if($validar!=null){
                return back()->with('error', 'El comentario ya existe');
            }

            $coment = new Comentario();
            $coment->comentario = $request->comentario;
            $coment->user_id = $request->user_id;
            $coment->producto_id = $request->producto_id;

            $coment->save();
            return back()->with('mensaje', 'Comentario añadido correctamente');
        }catch(\Exception $ex){
            return back()->with('error', 'El comentario no ha podido subirse');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        if(Auth::user()==$comentario->user || Auth::user()->tipo==1){
            try{
                $comentario->delete();
                return back()->with('mensaje', 'Tu comentario se ha eliminado correctamente');
            }catch(\Exception $ex){
                return back()->with('error', 'Tu comentario no ha podido eliminarse');
            }
        }else{
            return back();
        }
    }
}
