<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Producto;
use App\Models\Guardado;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ver_perfil($user_id){
        $user = User::get()->where('id', "=", $user_id)->take(1);
        $productos = Producto::orderBy('id', 'desc')->where('user_id', "=", $user_id)->paginate(25);
        $n_prods = $productos->count();
        $guardados = Guardado::orderBy('id', 'desc')->where('user_id', "=", $user_id)->paginate(25);
        $n_guards = $guardados->count();
        return view('users.user-profile', compact('user', 'productos', 'n_prods', 'guardados', 'n_guards'));
    }

    public function admin_zone(){
        // $users = User::all();
        if(isset($_GET['menu'])){
            return view('users.admin.menu-admin');
        }
        if(isset($_GET['prod'])){
            return view('users.admin.dt-productos');
        }
        return view('users.admin.index');
    }

    public function mod_user($user_id){
        $user = User::get()->where('id', "=", $user_id)->take(1);
        foreach($user as $user1){
            $user = $user1;
        }
        
        return view('auth.modify', compact('user'));

    }

    public function modify_user(Request $request, User $user){
        
        try{
            $request->validate([
                'name' => 'required|string|max:255|min:3',
                'email' => 'required|string|email|max:255',
                'ciudad' => 'required|string|min:4'
            ]);

            $foto = $user->foto;

            if($request->has('image')){
                $request->validate(['image'=>['image']]);
                $nom = $request->image;
                $nom2 = "img/users/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));

                if($foto!="storage/img/users/default.png"){
                    unlink($user->foto);
                }

                $foto = 'storage/'.$nom2;
            }
            
            if($request->has('del_image')){
                if($foto!="storage/img/users/default.png"){
                    unlink($user->foto);
                }
                $foto = "storage/img/users/default.png" ;
            }

            $user->update([
                'name'=> $request->get('name'),
                'email'=>$request->email,
                'ciudad'=>$request->ciudad,
                'foto'=>$foto
            ]);


    
            return back()->with('mensaje', 'Usuario actiualizado correctamente');

        }catch(\Exception $ex){
            return back()->with('error', 'El usuario no ha podido modificarse, compruebe los campos o pruebe más tarde');
        }



    }
}
