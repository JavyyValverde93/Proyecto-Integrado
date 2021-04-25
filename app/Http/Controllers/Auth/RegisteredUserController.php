<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'ciudad' => 'required|string|min:4'
        ]);

        $foto = "storage/img/users/default.png";

        if($request->has('image')){
            $request->validate(['image'=>['image']]);
            $nom = $request->image;
            $nom2 = "img/users/".uniqid()."_".$nom->getClientOriginalName();
            Storage::disk("public")->put($nom2, File::get($nom));
            $foto = 'storage/'.$nom2;
        }

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ciudad' => $request->ciudad,
            'foto'=>$foto
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
