<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        $id = session('user.id');
        $tickets = User::find($id)->tickets()->get()->toArray();


        return view('home', ['tickets' => $tickets]);
    }

    public function newTickets(){
        echo "Vamos criar um novo ticket";
    }
}
