<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
   public function login (){
    return view('login');
   }

   public function loginSubmit (Request $request){

    // form validation

    $request->validate(
        [
            'text_email' => 'required',
            'text_password' => 'required|min:8'
        ],
        [
            'text_email.required' => 'O username é obrigatório',
            'text_email.required' => 'Username deve ser um e-mail válido',
            'text_password.required' => 'A password é obrigatório',
            'text_password.min' => 'A password precisa conter no minimo :min caracteres'
        ]
    );

    $email = $request->input('text_email');
    $password = $request->input('text_password');

    //test database connection
    $user = User::where('email', $email)->first();

    if(!$user){
        return redirect()->back()->withInput()->with('ErrorLogin', 'E-mail ou senha incorretos');
    }

    if(!password_verify($password, $user->password)){
        return redirect()->back()->withInput()->with('ErrorLogin', 'E-mail ou senha incorretos');
    }

    session([
        'user' => [
            'id' => $user->id,
            'name' => $user->name
        ]
        ]);

    return redirect()->to('/');
   }

   public function logout ()
   {
        session()->forget('user');
        return redirect()->to('/login');
   }
}
