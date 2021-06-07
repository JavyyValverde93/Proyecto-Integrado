<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $request->validate([
            'pregunta'=>'required|min:6|max:150',
            'user_id'=>'required',
            'producto_id'=>'required'
        ],[
            'pregunta.required' => 'El campo pregunta es obligatorio',
        ]);

        $validar = Pregunta::where('pregunta', $request->pregunta)->where('producto_id', $request->producto_id)->first();
        if($validar!=null){
            return back()->with('error', 'La pregunta ya existe');
        }

        try{

            $preg = new Pregunta();
            $preg->pregunta = $request->pregunta;
            $preg->user_id = $request->user_id;
            $preg->producto_id = $request->producto_id;

            $preg->save();

            return back()->with('mensaje', 'Pregunta realizada correctamente');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido realizar la pregunta: '.$ex->getMessage());
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
        $request->validate([
            'respuesta'=>'required|min:2|max:150'
        ],[
            'respuesta.required' => 'La respuesta es obligatoria',
            'respuesta.min' => 'La respuesta no supera la longitud mínima'
        ]);
        
        try{

            $pregunta->respuesta = $request->respuesta;
            $pregunta->save();

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
        if(Auth::user()==$pregunta->user || Auth::user()->tipo==1){
            try{
                if(isset($_GET['p']) && $_GET['p']=="|"){
                    $pregunta->update([
                        'respuesta'=>null
                    ]);
                    return back()->with('mensaje', 'Respuesta borrada con éxito');
                }
                $pregunta->delete();
                return back()->with('mensaje', 'Pregunta eliminada con éxito');
            }catch(\Exception $ex){
                return back()->with('error', 'Tu respuesta/pregunta no ha podido eliminarse');
            }
        }else{
            return back();
        }

    }
}
