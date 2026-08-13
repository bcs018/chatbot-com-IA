<x-home title="Login">
    <div class="d-flex justify-content-center align-items-center vh-100 p-3">
        <div class="card p-4">
            <div class="p-4 " style="width: 350px;">
                <div class="text-center mb-4">
                    <img class="text-center" width="200px" height="200px" src="{{ asset('images/logo2.png') }}" alt="Logo">
                </div>
                <form method="POST" action="{{ route('loginPost') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                            name="email" value="{{ old('email') }}">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password"
                            placeholder="Password">
                        <label for="floatingPassword">Senha</label>
                    </div>
                    <div class="mt-3 d-grid gap-2">
                        <button class="btn btn-outline-secondary" type="submit">Login</button>
                    </div>
                    <div class="mt-3 d-grid gap-2">
                        <a class="btn bg-main-buttom" href="{{ route('cadastrese') }}">Cadastre-se</a>
                    </div>
                    <div class="mt-4 text-center">
                        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="#">
                            Esqueci minha senha
                        </a>
                    </div>
                    @if (session('error'))
                        <div class="mt-3 alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-home>
