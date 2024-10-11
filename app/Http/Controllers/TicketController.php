<?php

// namespace App\Http\Controllers;

// use App\Models\Ticket;
// use Illuminate\Http\Request;

// class TicketController extends Controller
// {
//     public function index()
//     {
//         $tickets = Ticket::all();
//         return view('tickets.index', compact('tickets'));
//     }

//     public function create()
//     {
//         return view('tickets.create');
//     }

//     public function store(Request $request)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//     ]);

//     // Após validação, cria o registro no banco de dados
//     Ticket::create([
//         'title' => $request->title,
//         'description' => $request->description,
//         'status' => 'aberto', // ou outro valor default que quiser
//     ]);

//     // Redireciona ou retorna uma resposta
//     return redirect()->back()->with('success', 'Chamado criado com sucesso!');
// }
// }
