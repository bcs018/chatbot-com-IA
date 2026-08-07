<x-app title="Cadastro de Empresas">
    <div class="pt-5 text-center">
        <h2>Cadastro de empresas</h2>
    </div>
    
    <div class="pt-5">
        <form action="{{route('empresa.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome empresa</label>
                <input type="text" class="form-control" id="nome" aria-describedby="nome" name="nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
            </div>
            <button type="submit" class="btn bg-main-buttom">Cadastrar</button>
        </form>

        @if (session('success'))
            <div class="mt-3 alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mt-3 alert alert-error">
                {{ session('error') }}
            </div>
        @endif
    </div>
</x-app>