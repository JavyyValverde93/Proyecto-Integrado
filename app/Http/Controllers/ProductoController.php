<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Picture;
use App\Models\Guardado;
use App\Models\Comentario;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::orderBy('id', 'desc')->nombre($request->nombre)->categoria($request->categoria)->paginate(30);
        $scope = $request->nombre;
        $guardados = Guardado::all();
        return view('productos.index', compact('productos', 'guardados', 'request', 'scope'))->with('error', 'Hostia pilotes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.vender_producto');
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
            $prod = new Producto();
            $prod->nombre = $request->nombre;
            $prod->descripcion = $request->descripcion;
            $prod->categoria = $request->categoria;
            $prod->precio = $request->precio;
            $prod->user_id = $request->user_id;

            if($request->has('foto1')){
                $request->validate(['foto1'=>['image']]);
                $nom = $request->foto1;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $prod->foto1 = 'storage/'.$nom2;

            }
            if($request->has('foto2')){
                $request->validate(['foto2'=>['image']]);
                $nom = $request->foto2;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $prod->foto2 = 'storage/'.$nom2;
            }

            if($request->has('foto3')){
                $request->validate(['foto3'=>['image']]);
                $nom = $request->foto3;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $prod->foto3 = 'storage/'.$nom2;
            }

            if($request->has('foto4')){
                $request->validate(['foto4'=>['image']]);
                $nom = $request->foto4;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $prod->foto4 = 'storage/'.$nom2;
            }

            if($request->has('foto5')){
                $request->validate(['foto5'=>['image']]);
                $nom = $request->foto5;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $prod->foto5 = 'storage/'.$nom2;
            }

            $prod->save();

            return redirect()->route('productos.index')->with('mensaje', 'Articulo puesto en venta correctamente');
        }catch(\Exception $ex){
            return redirect()->route('productos.create', compact('request'))->with('error', 'Ha habido algún error con los datos, compruebe los datos y las imágenes introducidas: '.$ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $comentarios = Comentario::orderBy('updated_at', 'desc')->where('producto_id', "=", $producto->id)->get();
        $preguntas = Pregunta::orderBy('updated_at')->where('producto_id', "=", $producto->id)->get();
        $resPreg = Respuesta::all()->where('producto_id', "=", $producto->id);
        $guardados = Guardado::all()->where('producto_id', "=", $producto->id);
        $favoritos = $guardados->count();
        if(isset(Auth::user()->id)){
            $guardados = $guardados->where('user_id', Auth::user()->id);
        }else{
            $guardados = [];
        }
        if(isset($_GET['u']) && $_GET['u']=='%'){
            $producto->update([
                'visualizaciones' => $producto->visualizaciones + 1
            ]);
            echo '<script>history.pushState(null, "", window.location+"¬");</script>';
        }
        return view('productos.detalle', compact('producto', 'comentarios', 'preguntas', 'resPreg', 'guardados', 'favoritos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $fotos = Picture::orderBy('posicion')->where('producto_id' == $producto->id)->all();
        return view('producto.edit', compact('producto', 'fotos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => ['required'],
            'descripcion' => ['required'],
            'precio' => ['required'],
            'user_id' => ['required'],
            'foto' => ['required']
        ]);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->user_id = $request->user_id;

        $request->validate(['foto'=>['image']]);
        $nom = $request->foto;
        $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
        Storage::disk("public")->put($nom2, File::get($nom));

        $foto0 = new Picture();
        $foto0->foto = "storage/".$nom2;
        $foto0->posicion = 0;
        $foto0->user_id = $request->user_id;

        if($request->has('foto1')){
            $request->validate(['foto1'=>['image']]);
            $nom = $request->foto;
            $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
            Storage::disk("public")->put($nom2, File::get($nom));

            $foto1 = new Picture();
            $foto1->foto = "storage/".$nom2;
            $foto1->posicion = 0;
            $foto1->user_id = $request->user_id;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
