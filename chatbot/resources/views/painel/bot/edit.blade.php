<x-dashboard title="Editar bots">

    <div class="pt-5 text-center">
        <h2>Editar bots</h2>
    </div>
    
    <div class="pt-5 d-flex justify-content-center">
        <div class="col-9">
            <form action="{{route('bots.update', $bots->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do bot</label>
                    <input type="text" 
                           class="form-control" 
                           id="nome" 
                           aria-describedby="nome" 
                           value="{{old('nome', $bots->nome)}}" 
                           name="nome" 
                           placeholder="Exemplo: Serviços da clínica, Sobre a empresa ou Atendimento ao cliente">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="ativo" name="ativo" {{$bots->ativo ? 'checked' : ''}}>
                        <label class="form-check-label" for="ativo">
                            Ativo
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn bg-main-buttom">Cadastrar</button>
            </form>
            @if (session('success'))
                <div class="mt-3 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    
            @if ($errors->any())
                <div class="mt-3 alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

</x-dashboard>
