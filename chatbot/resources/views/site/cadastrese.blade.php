<x-home title="Cadastre-se">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card p-4">

                <h3 class="text-center mb-4 text-light">🚀 Criar Conta</h3>

                <form method="POST" action="{{route('usuario.store')}}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label text-light">Empresa</label>
                        <input type="text" 
                            name="empresa" 
                            class="form-control {{$errors->has('empresa') ? 'is-invalid' : ''}}" 
                            placeholder="Nome da sua empresa" 
                            value="{{old('empresa')}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Nome</label>
                        <input type="text" 
                            name="name" 
                            class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" 
                            placeholder="Seu nome" 
                            value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Email</label>
                        <input type="email" 
                            name="email" 
                            class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" 
                            placeholder="seu@email.com" 
                            value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Senha</label>
                        <input type="password" 
                            name="password" 
                            class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" 
                            placeholder="******" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Confirmar Senha</label>
                        <input type="password" 
                            name="password_confirmation" 
                            class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"
                            placeholder="******" >
                    </div>

                    <button type="submit" class="btn btn-main w-100 mt-4">
                        Criar Conta
                    </button>
                </form>
                
                <div class="text-center mt-4">
                    <small class="text-light">
                        Já tem conta?
                        <a href="{{ route('login') }}" class="text-color-orange">Entrar</a>
                    </small>
                </div>

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
    </div>
</x-home>
