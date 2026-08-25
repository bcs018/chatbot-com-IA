<x-dashboard title="Bots">

    <div class="pt-5 text-center">
        <h2>Bots</h2>
    </div>

    <div class="pt-5 d-flex justify-content-center">
        <div class="col-9">
            <div class="mb-5">
                <a href="{{route('bots.create')}}" class="btn btn-primary-custom">
                    <i class="bi bi-plus-lg"></i>
                    Cadastrar novo bot
                </a>
            </div>

            @if (session('success'))
                <div class="mt-3 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($bots->isNotEmpty())
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Ativo</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bots as $bot)
                            <tr>
                                <td>{{$bot->nome}}</td>
                                <td>{{($bot->ativo == 1) ? 'SIM' : 'NÃO'}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <form action="{{route('bots.destroy', $bot->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-excluir">
                                                <i class="bi bi-trash3-fill me-2" title="Excluir bot"></i>
                                            </button>
                                        </form>
                                
                                        <a href="{{route('bots.edit', $bot->id)}}" class="text-decoration-none" style="color: black">
                                            <i class="bi bi-pencil-square" title="Editar bot"></i>
                                        </a>
                                    </div>
                                <td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <h5 class="text-center">Não há bots cadastrados</h5>
            @endif


            
        </div>
    </div>

</x-dashboard>
