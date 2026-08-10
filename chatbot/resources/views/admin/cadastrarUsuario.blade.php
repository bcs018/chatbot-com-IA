<x-app title="Cadastro de Empresas">
    <div class="pt-5 text-center">
        <h2>Cadastro de usuários</h2>
    </div>
    
    <div class="pt-5">
        <form action="{{route('usuario.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" aria-describedby="password" name="password">
            </div>
            <div class="mb-3">
                <label for="empresa" class="form-label">Empresa</label>
                <select class="form-select" aria-label="Default select example" id="empresa" name="empresa">
                    @foreach ($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                    @endforeach
                </select>
            </div>
            @if (Auth::user()->admin)
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkDefault" name="admin">
                        <label class="form-check-label" for="checkDefault">
                            Administrador
                        </label>
                    </div>
                </div>
            @endif
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