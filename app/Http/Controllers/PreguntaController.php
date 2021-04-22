<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
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
                'pregunta'=>['required'],
                'user_id'=>['required'],
                'producto_id'=>['required']
            ]);

            $preg = new Pregunta();
            $preg->pregunta = $request->pregunta;
            $preg->user_id = $request->user_id;
            $preg->producto_id = $request->producto_id;

            $preg->save();

            return back()->with('mensaje', 'Pregunta realizada correctamente');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido realizar la pregunta');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        try{
            $request->validate([
                'respuesta'=>['required']
            ]);

            $pregunta->update([
                'respuesta'=>$request->respuesta
            ]);

            return back()->with('mensaje', 'Pregunta respondida correctamente');

        }catch(\Exception $ex){
            return back()->with('error', 'La pregunta no ha podido responderse');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        if(isset($_GET['p']) && $_GET['p']=="|"){
            $pregunta->update([
                'respuesta'=>null
            ]);
            return back()->with('mensaje', 'Respuesta borrada con éxito');
        }
        $pregunta->delete();
        return back()->with('mensaje', 'Pregunta eliminada con éxito');
    }
}
