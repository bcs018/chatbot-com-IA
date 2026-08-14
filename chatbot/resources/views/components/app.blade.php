<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-color">
    <div class="d-flex">
        <aside class="bg-dark text-white p-3 vh-100" style="width: 260px;">
            <h4 class="mb-4">Meu site</h4>

            <nav class="nav flex-column">
            <a class="nav-link text-white active bg-primary rounded mb-2" href="#">
                Início
            </a>
            <a class="nav-link text-white mb-2" href="#">Dashboard</a>
            <a class="nav-link text-white mb-2" href="#">Usuários</a>
            <a class="nav-link text-white mb-2" href="#">Configurações</a>

            <hr>

            <a class="nav-link text-danger" href="#">Sair</a>
            </nav>
        </aside>

        <main class="p-4">
            {{ $slot }}
        </main>
    </div>


    {{-- <nav class="nav flex-column navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo" width="48" height="42" class="d-inline-block align-text-top">
            </a>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    @if (Auth::user()->admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('empresa.create')}}">Empresas</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('usuario.create')}}">Usuários</a>
                    </li>
                </ul>
                
                <span class="navbar-text me-4 fw-medium">
                    {{Auth::user()->name}}
                </span>

                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link fw-bold text-danger" >Sair</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        {{ $slot }}
    </div> --}}
</body>

</html>
