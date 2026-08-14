<x-dashboard title="Home">

    <div class="content">
        <!-- WELCOME -->
        <div class="welcome">
            <div>
                <h1>
                    Olá, {{ auth()->user()->name ?? 'Usuário' }} 👋
                </h1>
                <p>
                    Aqui está um resumo do seu InteliChat.
                </p>
            </div>

            <a href="#" class="btn btn-primary-custom">
                <i class="bi bi-plus-lg"></i>
                Novo conteúdo
            </a>
        </div>

        <!-- STATISTICS -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-robot"></i>
                    </div>
                    <div>
                        <span class="stat-label">
                            Bots ativos
                        </span>
                        <strong class="stat-value">
                            1
                        </strong>
                        <small class="stat-description">
                            Seu bot está ativo
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <div>
                        <span class="stat-label">
                            Conversas
                        </span>
                        <strong class="stat-value">
                            152
                        </strong>
                        <small class="stat-description positive">
                            +12% este mês
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-database"></i>
                    </div>
                    <div>
                        <span class="stat-label">
                            Documentos
                        </span>
                        <strong class="stat-value">
                            24
                        </strong>
                        <small class="stat-description">
                            Base de conhecimento
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <div>
                        <span class="stat-label">
                            Respostas
                        </span>
                        <strong class="stat-value">
                            1.284
                        </strong>
                        <small class="stat-description positive">
                            +18% este mês
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN GRID -->
        <div class="row g-4">
            <!-- BOT -->
            <div class="col-12 col-xl-8">
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <div>
                            <h2>
                                Seu assistente
                            </h2>
                            <p>
                                Configure e acompanhe seu chatbot.
                            </p>
                        </div>
                        <span class="status-badge">
                            <span></span>
                            Ativo
                        </span>
                    </div>

                    <div class="bot-container">
                        <div class="bot-avatar">
                            <i class="bi bi-robot"></i>
                        </div>

                        <div class="bot-info">
                            <h3>
                                Assistente da empresa
                            </h3>
                            <p>
                                Seu chatbot está pronto para atender seus clientes.
                            </p>

                            <div class="bot-meta">
                                <span>
                                    <i class="bi bi-database"></i>
                                    24 documentos
                                </span>
                                <span>
                                    <i class="bi bi-chat"></i>
                                    152 conversas
                                </span>
                            </div>
                        </div>

                        <div class="bot-action">
                            <a href="#" class="btn btn-outline-custom">
                                Configurar
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- QUICK ACTIONS -->
            <div class="col-12 col-xl-4">
                <div class="dashboard-card h-100">
                    <div class="card-header-custom">
                        <div>
                            <h2>
                                Ações rápidas
                            </h2>
                            <p>
                                Gerencie seu sistema.
                            </p>
                        </div>
                    </div>

                    <div class="quick-actions">
                        <a href="#" class="quick-action">
                            <div class="quick-icon">
                                <i class="bi bi-file-earmark-plus"></i>
                            </div>
                            <div>
                                <strong>
                                    Adicionar documento
                                </strong>
                                <small>
                                    Ensine algo novo ao seu bot
                                </small>
                            </div>
                            <i class="bi bi-chevron-right"></i>
                        </a>

                        <a href="#" class="quick-action">
                            <div class="quick-icon">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <div>
                                <strong>
                                    Instalar no site
                                </strong>
                                <small>
                                    Adicione o chat ao seu site
                                </small>
                            </div>
                            <i class="bi bi-chevron-right"></i>
                        </a>

                        <a href="#" class="quick-action">
                            <div class="quick-icon">
                                <i class="bi bi-gear"></i>
                            </div>
                            <div>
                                <strong>
                                    Configurar bot
                                </strong>

                                <small>
                                    Personalize seu assistente
                                </small>
                            </div>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>


            <!-- CONVERSATIONS -->
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <div>
                            <h2>
                                Conversas recentes
                            </h2>
                            <p>
                                Últimos atendimentos realizados pelo seu bot.
                            </p>
                        </div>
                        <a href="#" class="link-custom">
                            Ver todas
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table conversation-table">
                            <thead>
                                <tr>
                                    <th>
                                        Cliente
                                    </th>
                                    <th>
                                        Última mensagem
                                    </th>
                                    <th>
                                        Data
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="client">
                                            <div class="client-avatar">
                                                J
                                            </div>

                                            <span>
                                                João Silva
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        Gostaria de saber os horários...
                                    </td>
                                    <td>
                                        Hoje, 10:32
                                    </td>
                                    <td>
                                        <span class="conversation-status">
                                            Finalizada
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="client">
                                            <div class="client-avatar">
                                                M
                                            </div>
                                            <span>
                                                Maria Santos
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        Vocês trabalham com...
                                    </td>
                                    <td>
                                        Hoje, 09:15
                                    </td>
                                    <td>
                                        <span class="conversation-status">
                                            Finalizada
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="client">
                                            <div class="client-avatar">
                                                P
                                            </div>
                                            <span>
                                                Pedro Oliveira
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        Gostaria de fazer um orçamento...
                                    </td>
                                    <td>
                                        Ontem, 18:42
                                    </td>
                                    <td>
                                        <span class="conversation-status">
                                            Finalizada
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dashboard>
