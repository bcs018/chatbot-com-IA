<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - InteliChat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #fff; color: #171717 ">
    <div class="app">
        <!-- SIDEBAR -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="/" class="logo">
                    <span class="logo-icon">
                        I
                    </span>
                    <span class="logo-text">
                        Inteli<span>Chat</span>
                    </span>
                </a>
                <button class="btn-close-sidebar d-lg-none" id="closeSidebar">
                    ×
                </button>
            </div>

            <!-- MENU -->
            <nav class="sidebar-menu">
                <small class="menu-title">
                    PRINCIPAL
                </small>
                <a href="{{route('dashboard')}}" class="menu-item active">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{route('bots.index')}}" class="menu-item">
                    <i class="bi bi-robot"></i>
                    <span>Meu Bot</span>
                </a>

                <a href="{{route('documento.index')}}" class="menu-item">
                    <i class="bi bi-database"></i>
                    <span>Base de conhecimento</span>
                </a>

                <a href="#" class="menu-item">
                    <i class="bi bi-chat-dots"></i>
                    <span>Conversas</span>
                </a>

                <small class="menu-title mt-4">
                    CONFIGURAÇÕES
                </small>

                <a href="#" class="menu-item">
                    <i class="bi bi-bar-chart"></i>
                    <span>Estatísticas</span>
                </a>

                <a href="#" class="menu-item">
                    <i class="bi bi-gear"></i>
                    <span>Configurações</span>
                </a>
            </nav>


            <!-- SIDEBAR BOTTOM -->

            <div class="sidebar-bottom">
                <div class="upgrade-card">
                    <div class="upgrade-icon">
                        ✨
                    </div>
                    <strong>
                        Plano gratuito
                    </strong>
                    <small>
                        Faça upgrade para liberar mais recursos.
                    </small>
                    <button class="btn btn-upgrade">
                        Fazer upgrade
                    </button>
                </div>
            </div>
        </aside>

        <!-- OVERLAY MOBILE -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- MAIN -->
        <main class="main">
            <!-- NAVBAR -->
            <header class="topbar">
                <button class="menu-toggle" id="openSidebar">
                    <i class="bi bi-list"></i>
                </button>

                <div class="topbar-title">
                    <span class="d-none d-sm-inline">
                        Dashboard
                    </span>
                </div>

                <div class="topbar-actions">
                    <button class="icon-button">
                        <i class="bi bi-bell"></i>
                    </button>

                    <div class="dropdown">
                        <button class="user-button" data-bs-toggle="dropdown">
                            <div class="avatar">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                            </div>
                            <span class="d-none d-md-block">
                                {{ auth()->user()->name ?? 'Usuário' }}
                            </span>
                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-person me-2"></i>
                                    Meu perfil
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-gear me-2"></i>
                                    Configurações
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- CONTENT -->
            {{$slot}}

            <!-- FOOTER -->
            {{-- <footer class="footer">
                <span>
                    © {{ date('Y') }} InteliChat
                </span>
                <span>
                    Feito para automatizar seu atendimento.
                </span>
            </footer> --}}
        </main>
    </div>
</body>
</html>
