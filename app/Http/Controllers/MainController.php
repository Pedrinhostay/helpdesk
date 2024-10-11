<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
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
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        // Valida os dados do ticket
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $userId = session('user')['id'];
        // Cria um novo ticket
        Ticket::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $userId,
            'status' => 'open',
        ]);

        return redirect()->route('home')->with('success', 'Ticket criado com sucesso!');
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket->delete();
            return redirect()->back()->with('success', 'Ticket deletado com sucesso!');
        }

        return redirect()->back()->withErrors(['msg' => 'Ticket não encontrado.']);
    }
}
