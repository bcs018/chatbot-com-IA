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
                                <a href="/teste" class="text-decoration-none" style="color: crimson">
                                    <i class="bi bi-trash3-fill me-2" title="Excluir bot"></i>
                                </a>
                                <a href="/teste" class="text-decoration-none" style="color: black">
                                    <i class="bi bi-pencil-square" title="Editar bot"></i>
                                </a>
                            <td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-dashboard>
