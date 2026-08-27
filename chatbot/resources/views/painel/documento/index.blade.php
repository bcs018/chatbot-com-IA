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

            @if (session('success'))
                <div class="mt-3 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($conhecimentos->isNotEmpty())
                <table class="table table-hover">
                    <tbody>
                        @foreach ($conhecimentos as $conhecimento)
                            <tr class="table-active">
                                <td colspan="3" class="p-3">{{$conhecimento->nome}}</td>
                            </tr>
                            @forelse ($conhecimento->documentos as $documento)
                                <tr>
                                    <td class="ps-5 p-3">{{$documento->titulo}}</td> 
                                    <td class="p-3">{{$documento->conteudo}}</td>
                                    <td class="p-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <form action="{{route('documento.destroy', $documento->id)}}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-excluir">
                                                    <i class="bi bi-trash3-fill me-2" title="Excluir conhecimento"></i>    
                                                </button>
                                            </form>
                                            
                                            <a href="{{route('documento.edit', $documento->id)}}" class="text-decoration-none" style="color: #000000" >
                                                <i class="bi bi-pencil-square" title="Editar conhecimento"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty 
                                <tr>
                                    <td class="ps-5 p-3"><i>Bot sem conhecimento cadastrado</i></td> 
                                    <td class="p-3" colspan="2"><i>Bot sem conhecimento cadastrado</i></td> 
                                </tr>
                            @endforelse
                        @endforeach
                    </tbody>
                </table>
            @else 
                <h5 class="text-center">Não há conhecimentos cadastrados</h5>
            @endif
        </div>
    </div>

</x-dashboard>
