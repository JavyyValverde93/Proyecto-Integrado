<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
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
        $ord = 'id';
        $ord2 = 'desc';

        if($request->ordenar!=null){
            $ord = $request->ordenar;
            $ord2 = 'asc';

            if($ord=='viejos'){
                $ord='id';
            }else if($ord=='nuevos'){
                $ord = 'id';
                $ord2 = 'desc';
            }else if($ord=='precio-bajo'){
                $ord ='precio';
            }else if($ord=='precio-alto'){
                $ord ='precio';
                $ord2 ='desc';
            }else if($ord=='visitas'){
                $ord='visualizaciones';
                $ord2='desc';
            }else if($ord=='menos-visitas'){
                $ord = 'visualizaciones';
                $ord2 = 'asc';
            }else if($ord=='gustados'){
                $ord = 'guardados';
                $ord2 = 'desc';
            }else if($ord == 'menos-gustados'){
                $ord = 'guardados';
                $ord2 = 'asc';
            }
        }
        if($request->ciudad==null || $request->ciudad=="Cualquier Lugar"){
            $request->ciudad = "%";
        }                   
                        
        $ciudades = User::select('ciudad')->distinct()->orderBy('ciudad')->get();
        $productos = Producto::orderBy($ord, $ord2)->nombre($request->nombre)
        ->categoria($request->categoria)->whereIn('user_id', User::where('ciudad', 'like', "%$request->ciudad%")->get('id')->toArray())->paginate(24);
        $scope = $request->nombre;
        if($request->categoria!=null || $request->nombre!=null){
            return view('productos.index2', compact('productos', 'request', 'scope', 'ciudades'));
        }
        return view('productos.index', compact('productos', 'request', 'scope', 'ciudades'));
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

        $request->validate([
            'nombre'=>['required', 'min:5', 'max:20'],
            'descripcion'=>['required', 'string', 'min:10', 'max:400'],
            'categoria'=>['required'],
            'precio'=>['required', 'min:0.05'],
            'foto1'=>['required', 'image'],
            'user_id'=>['required']
        ],[
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre no supera la longitud mínima',
            'descripcion.required' => 'El campo descripción es obligatorio',
            'descripcion.min' => 'El campo descripción no supera la longitud mínima',
            'categoria.required' => 'No se ha seleccionado ninguna categoría',
            'precio.required' => 'El precio es obligatorio',
            'foto1.required'=>'Es obligatorio usar al menos una imágen',
            'foto1.image'=>'Es obligatorio usar una imágen'
        ]);

        $validar = Producto::where('nombre', $request->nombre)->where('descripcion', $request->descripcion)->where('user_id', $request->user_id)->first();
        if($validar!=null){
            return back();
        }
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
        $preguntas = Pregunta::orderBy('updated_at', 'desc')->where('producto_id', "=", $producto->id)->get();
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
        if(Auth::user()==$producto->user){
            return view('productos.modificar_producto', compact('producto'));
        }
        if(Auth::user()->tipo==1){
            return view('productos.modificar_producto', compact('producto'));
        }else{
            return redirect()->route('login');
        }
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
            'nombre'=>['required', 'min:5', 'max:20'],
            'descripcion'=>['required', 'string', 'min:10', 'max:400'],
            'categoria'=>['required'],
            'precio'=>['required', 'min:0.05'],
        ],[
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre no supera la longitud mínima',
            'descripcion.required' => 'El campo descripción es obligatorio',
            'descripcion.min' => 'El campo descripción no supera la longitud mínima',
            'categoria.required' => 'No se ha seleccionado ninguna categoría',
            'precio.required' => 'El precio es obligatorio',
        ]);

        try{
            $validar = Producto::where('nombre', $request->nombre)->where('descripcion', $request->descripcion)->where('user_id', $request->user_id)->first();
            if($validar!=null && $validar->id!=$producto->id){
                return back()->with('error', 'Este producto ya existe');
            }
            $producto->update([
                'nombre'=>$request->nombre,
                'descripcion'=>$request->descripcion,
                'categoria'=>$request->categoria,
                'precio'=>$request->precio,
            ]);

            if($request->has('foto1')){
                $request->validate(['foto1'=>['image']]);
                $nom = $request->foto1;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $producto->update(['foto1'=> 'storage/'.$nom2]);

            }
            if($request->has('foto2')){
                $request->validate(['foto2'=>['image']]);
                $nom = $request->foto2;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $producto->update(['foto2' => 'storage/'.$nom2]);
            }

            if($request->has('foto3')){
                $request->validate(['foto3'=>['image']]);
                $nom = $request->foto3;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $producto->update(['foto3' => 'storage/'.$nom2]);
            }

            if($request->has('foto4')){
                $request->validate(['foto4'=>['image']]);
                $nom = $request->foto4;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $producto->update(['foto4' => 'storage/'.$nom2]);
            }

            if($request->has('foto5')){
                $request->validate(['foto5'=>['image']]);
                $nom = $request->foto5;
                $nom2 = "img/productos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $producto->update(['foto5' => 'storage/'.$nom2]);
            }

            return redirect()->route('productos.index')->with('mensaje', 'Articulo modificado correctamente');
        }catch(\Exception $ex){
            return redirect()->back(compact('request'))->with('error', 'Ha habido algún error con los datos, compruebe los datos y las imágenes introducidas: '.$ex);
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
        if(Auth::user()==$producto->user || Auth::user()->tipo==1){
            $id = $producto->user->id;
            try{
                if($producto->foto1!=null && $producto->foto1!='storage/productos/default.png'){
                    unlink($producto->foto1);
                }
                if($producto->foto2!=null && $producto->foto2!='storage/productos/default.png'){
                    unlink($producto->foto2);
                }
                if($producto->foto3!=null && $producto->foto3!='storage/productos/default.png'){
                    unlink($producto->foto3);
                }
                if($producto->foto4!=null && $producto->foto4!='storage/productos/default.png'){
                    unlink($producto->foto4);
                }
                if($producto->foto5!=null && $producto->foto5!='storage/productos/default.png'){
                    unlink($producto->foto5);
                }

                $producto->delete();

                return redirect()->route('ver_perfil', $id)->with('mensaje', "Producto eliminado con éxito");

            }catch(\Exception $ex){
                return back()->with('error', "El producto no ha podido eliminarse, intentelo más tarde".$ex->getMessage());
            }

        }else{
            return redirect()->route('login');
        }
    }

    public function destroyprod($id)
    {
        $producto = Producto::all()->where('id', $id);
        foreach($producto as $prod){
            $producto = $prod;
        }

        if(Auth::user()==$producto->user || Auth::user()->tipo==1){
            try{
                if($producto->foto1!=null && $producto->foto1!='storage/productos/default.png'){
                    unlink($producto->foto1);
                }
                if($producto->foto2!=null && $producto->foto2!='storage/productos/default.png'){
                    unlink($producto->foto2);
                }
                if($producto->foto3!=null && $producto->foto3!='storage/productos/default.png'){
                    unlink($producto->foto3);
                }
                if($producto->foto4!=null && $producto->foto4!='storage/productos/default.png'){
                    unlink($producto->foto4);
                }
                if($producto->foto5!=null && $producto->foto5!='storage/productos/default.png'){
                    unlink($producto->foto5);
                }

                $producto->delete();

                if(isset($_GET['ad'])){
                    return back()->with('mensaje', "Producto eliminado con éxito");
                }
                return redirect()->route('productos.index')->with('mensaje', "Producto eliminado con éxito");

            }catch(\Exception $ex){
                return back()->with('error', "El producto no ha podido eliminarse, intentelo más tarde: ".$ex->getMessage());
            }
        }else{
            return redirect()->route('login');
        }
    }
}
