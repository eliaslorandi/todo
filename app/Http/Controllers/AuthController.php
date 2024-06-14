<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request){
        if(Auth::check()){ //irá conferir se a seção é valida, mais rapido que o ::User
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login_action(Request $request){
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($validator)){
            return redirect()->route('home');
        };

    }

    public function register(Request $request){
        $isLoggedIn = Auth::Check();
        if($isLoggedIn){
            return redirect()->route('home');
        }

        return view('register');
    }

    public function register_action(Request $request){
        /*
            REGRAS PARA REGISTRO

            - O usuario deve ter nome
            - O email deve ser único na tabela users
            - Todos os campos sao REQUIRED
            - Password deve ter no mínimo 6 caracteres

        */

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $data = $request->only('name', 'email', 'password');

        /**
         * verificar se o laravel já encripta automaticamente (creio que sim)
         * $data['password'] = Hash::make($data['password']);
         */

        User::create($data);
        return redirect(route('login'));
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }


}
