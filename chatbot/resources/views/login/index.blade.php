<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100 p-3">
        <div class="p-4 " style="width: 350px;">
            <div class="text-center mb-4">
                <img class="text-center" width="230px" height="230px" src="{{ asset('images/logo2.png') }}" alt="Logo">
            </div>
            <form method="POST" action="{{route('loginPost')}}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{old('email')}}">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                </div>
                <div class="mt-3 d-grid gap-2">
                    <button class="btn btn-outline-secondary" type="submit">Login</button>
                </div>
                <div class="mt-3 d-grid gap-2">
                    <button class="btn bg-main-buttom" type="submit">Cadastre-se</button>
                </div>
                <div class="mt-4 text-center">
                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="#">
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

</body>

</html>
