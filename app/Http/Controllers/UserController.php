<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Producto;
use App\Models\Guardado;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ver_perfil(Request $request, $user_id){
        $user = User::get()->where('id', "=", $user_id)->take(1);
        foreach($user as $u){
            $user = $u;
        }
        $productos = Producto::orderBy('id', 'desc')->where('user_id', "=", $user_id)->paginate(18);
        $n_prods = $productos->count();
        $n_seguidos = Follower::get()->where('seguidor', $user_id)->count();
        $n_seguidores = Follower::get()->where('seguido', $user_id)->count();
        if(Auth::user()!=null){
            $follower = Follower::get()->where('seguidor', Auth::user()->id)->where('seguido', $user_id)->take(1);
            foreach($follower as $follow){
                $follower = $follow;
            }
            if(Auth::user()==$user){
                $n_guards = Guardado::orderBy('id', 'desc')->where('user_id', "=", $user_id)->count();
            }else{
                $n_guards = null;
            }
        }else{
            $follower = null;
            $n_guards = null;
        }

        return view('users.user-profile', compact('request', 'user', 'productos', 'n_prods', 'n_guards', 'n_seguidos', 'n_seguidores', 'follower'));
    }

    public function admin_zone(){
        // $users = User::all();
        if(Auth::user()->tipo!=1){
            return redirect()->route('login');
        }

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
        if(Auth::user()==$user || Auth::user()->tipo==1){
            return view('auth.modify', compact('user'));
        }else{
            return redirect()->route('login');
        }
    }

    public function modify_user(Request $request, User $user){

        $request->validate([
            'name' => 'required|string|max:20|min:3',
            'email' => 'required|string|email',
            'ciudad' => 'required|string|min:4|max:20'
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'name.max' => 'El campo nombre es demasiado largo',
            'ciudad.max' => 'El campo ciudad es demasiado largo',
            'name.min' => 'El campo nombre no cumple los requisitos mínimos'
        ]);

        try{

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

            if($request->email!=$user->email){
                $user->update([
                    'email_verified_at' => null
                ]);
            }

            $user->update([
                'name'=> $request->get('name'),
                'email'=>$request->email,
                'ciudad'=>$request->ciudad,
                'foto'=>$foto
            ]);



            return back()->with('mensaje', 'Usuario actiualizado correctamente');

        }catch(\Exception $ex){
            return back()->with('error', 'El usuario no ha podido modificarse, compruebe los campos o pruebe más tarde'.$ex->getMessage());
        }
    }

    public function destroy_user($id){
        try{
            $user = User::all()->where('id', $id);
            foreach($user as $u){
                $user = $u;
            }
            if(Auth::user()==$user || Auth::user()->tipo==1){

                if($user->foto!="storage/img/users/default.png"){
                    unlink($user->foto);
                }
                $user->delete();
                if(isset($_GET['ad']) && $_GET['ad']==1){
                    return back()->with('mensaje', 'Usuario eliminado');
                }
                if(Auth::user()->tipo==1){
                    return back()->with('mensaje', 'Usuario eliminado');
                }
                return redirect()->route('login')->with('mensaje', 'Usuario eliminado');
            }else{
                return redirect()->route('productos.index');
            }

        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido eliminar el usuario');
        }
    }

    public function do_admin($id){
        try{
            $user = User::all()->where('id', $id);
            foreach($user as $u){
                $user = $u;
            }
            if(Auth::user()->tipo==1){
                $user->update([
                    'tipo' => 1
                ]);

                return back()->with('mensaje', "Usuario $user->name ahora es administrador");
            }else{
                return redirect()->route('login');
            }

        }catch(\Exception $ex){
            return back()->with('error', "Parece que no se ha podido hacer administrador, pruebe más tarde");
        }

    }

    public function undo_admin($id){
        try{
            $user = User::all()->where('id', $id);
            foreach($user as $u){
                $user = $u;
            }
            if(Auth::user()->tipo==1){
                $user->update([
                    'tipo' => 0
                ]);

                return back()->with('mensaje', "Usuario $user->name ya no es administrador");
            }else{
                return redirect()->route('login');
            }

        }catch(\Exception $ex){
            return back()->with('error', "Parece que no se ha podido deshacer el administrador, pruebe más tarde");
        }

    }


    public function modals_data($user_id){
        $seguidos = Follower::get()->where('seguidor', $user_id);
        $seguidores = Follower::get()->where('seguido', $user_id);
        if(Auth::user()!=null && Auth::user()->id == $user_id){
            $guardados = Guardado::orderBy('id', 'desc')->where('user_id', "=", $user_id)->get();
        }else{
            $guardados = [];
        }

        return view('users.modals-data', compact('seguidos', 'seguidores', 'guardados'));
    }

    public function reset_password(Request $request){
        return view('auth.reset-password');
    }

    public function change_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        try{
            $user->update([
                'password' => Hash::make($request->password)
            ]);
    
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login');

        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido cambiar la contraseña');
        }
    }
}
