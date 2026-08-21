<x-dashboard title="Base de conhecimento">

    <div class="pt-5 text-center">
        <h2>Base de conhecimento</h2>
    </div>

    <div class="pt-5 d-flex justify-content-center">
        <div class="col-9">
            <div class="mb-5">
                <a href="{{route('documento.create')}}" class="btn btn-primary-custom">
                    <i class="bi bi-plus-lg"></i>
                    Cadastrar novo conhecimento
                </a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Bot</th>
                        <th scope="col">Titulo conhecimento</th>
                        <th scope="col">Conhecimento</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conhecimentos as $conhecimento)
                        <tr>
                            <td>{{$conhecimento->nome}}</td>
                            @foreach ($conhecimento->documentos as $documento)
                                <td>{{($documento->titulo != null) ? $documento->titulo : 'Bot sem conhecimento'}}</td> Tem que arrumar aqui
                                <td>{{$documento->conteudo}}</td>
                            @endforeach
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
