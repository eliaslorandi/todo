<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request){
        return view('login');
    }

    public function login_action(Request $request){
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

    }

    public function register(Request $request){
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

        //verificar se o laravel já encripta automaticamente (creio que sim)
        //$data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect(route('login'));
    }


}
