<x-app title="Cadastro de Empresas">
    <div class="pt-5">
        <form action="{{route('empresa.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome empresa</label>
                <input type="text" class="form-control" id="nome" aria-describedby="nome" name="nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</x-app>