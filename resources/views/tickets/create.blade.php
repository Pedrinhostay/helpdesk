@extends('layouts.mainph')

@section('content')
    <h1>Criar Ticket</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <button type="submit">Criar Ticket</button>
    </form>
@endsection
