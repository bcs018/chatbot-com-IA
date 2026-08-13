<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}} | {{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <img class="text-center me-3" width="30px" height="30px" src="{{ asset('images/logo.png') }}" alt="Logo">
            <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Recursos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Preço</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                    <li class="nav-item">
                        <a class="btn btn-main ms-lg-3 mt-2 mt-lg-0" href="{{route('cadastrese')}}">Começar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{$slot}}

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <p class="text-secondary mb-0">
                © {{date('Y') .' '. config('app.name')}} - Todos os direitos reservados
            </p>
        </div>
    </footer>

</body>

</html>
