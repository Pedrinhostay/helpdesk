<div class="row mt-1">
    <div class="col">
        <div class="card p-4">
            <div class="row">
                <div class="col">
                    <h4 class="text-info">{{ $ticket['title'] }}</h4>
                    <small class="text-secondary"><span
                            class="opacity-75 me-2">Criado:</span><strong>{{ date('Y-m-d H:i:s', strtotime($ticket['created_at'])) }}</strong></small>
                </div>
                <div class="col text-end">

                    <form action="{{ route('ticket.destroy', $ticket['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm mx-1"
                            onclick="return confirm('Tem certeza que deseja finalizar este ticket?');">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                </div>
            </div>
            <hr>
            <p class="text-secondary">{{ $ticket['description'] }}</p>
        </div>
    </div>
</div>
