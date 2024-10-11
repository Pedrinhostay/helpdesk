<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function login (){
    return view('login');
   }

   public function loginSubmit (Request $request){

    // form validation

    $validated = $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|min:8',
    ], [
        'email.required' => 'Por favor, insira seu e-mail.',
        'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
        'email.exists' => 'Este e-mail não está registrado.',
        'password.required' => 'Por favor, insira sua senha.',
        'password.min' => 'A senha deve conter pelo menos 8 caracteres.',
    ]);

    $user = User::where('email', $validated['email'])->first();

    if ($user && Hash::check($validated['password'], $user->password)) {
        session(['user' => $user]);
        return redirect('/');
    }

    return back()->withErrors(['login_error' => 'As credenciais informadas estão incorretas.']);
   }

   public function logout ()
   {
        session()->forget('user');
        return redirect()->to('/login');
   }
}
