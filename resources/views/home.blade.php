@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">

                @include('top_header')

                <!-- no notes available -->
                @if (count($tickets) == 0)
                <div class="row mt-5">
                    <div class="col text-center">
                        <p class="display-6 mb-5 text-secondary opacity-50">Nenhum chamado em aberto!</p>
                        <a href="#" class="btn btn-secondary btn-lg p-3 px-5">
                            <i class="fa-regular fa-pen-to-square me-3"></i>Abrir um ticket
                        </a>
                    </div>
                </div>

                @else
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('newTicket')}}" class="btn btn-secondary px-3">
                            <i class="fa-regular fa-pen-to-square me-2"></i>New Note
                        </a>
                    </div>
                    <h1 class="mb-4">Lista de Tickets</h1>
                    @foreach ($tickets as $ticket)
                    @include('tickets.index')
                    @endforeach

                @endif


                <!-- notes are available -->
            </div>
        </div>
    </div>
@endsection
