<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function auth(Request $request){

        $credentials = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required'],           

        ], [

            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O email não é válido',
            'password.required' => 'O campo senha é obrigtório!'
        ]);

        if(Auth::attempt($credentials, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }else{
            return redirect()->back()->with('erro', 'Usuário ou senha inválidos');
        }


    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('index'));
    }

    public function create(){
        return view('login.create');
    }
}
