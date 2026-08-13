<x-home title="Home">
    
    <!-- HERO -->
    <section class="hero">
        <div class="container">
            <h1 class="fw-bold">
                Atendimento automático com IA 24h
            </h1>
            <p class="mt-3 text-secondary">
                Coloque um chatbot inteligente no seu site e responda seus clientes automaticamente.
            </p>

            <div class="mt-4">
                <a href="{{route('cadastrese')}}" class="btn btn-main btn-lg">Começar Agora</a>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="section">
        <div class="container">
            <div class="row text-center g-4">

                <div class="col-12 col-md-4">
                    <div class="card p-4 h-100">
                        <h5 class="text-light">🤖 Inteligente</h5>
                        <p class="text-secondary">
                            Responde clientes com base nas informações da sua empresa.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card p-4 h-100">
                        <h5 class="text-light">⚡ Rápido</h5>
                        <p class="text-secondary">
                            Respostas instantâneas 24 horas por dia.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card p-4 h-100">
                        <h5 class="text-light">💰 Aumenta vendas</h5>
                        <p class="text-secondary">
                            Nunca perca um cliente por falta de resposta.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- COMO FUNCIONA -->
    <section class="section bg-dark">
        <div class="container text-center">
            <h2 class="mb-4">Como funciona</h2>

            <div class="row g-4">

                <div class="col-12 col-md-4">
                    <h5>1️⃣ Cadastre seus dados</h5>
                    <p class="text-secondary">Adicione informações da sua empresa</p>
                </div>

                <div class="col-12 col-md-4">
                    <h5>2️⃣ IA aprende</h5>
                    <p class="text-secondary">Nosso sistema treina automaticamente</p>
                </div>

                <div class="col-12 col-md-4">
                    <h5>3️⃣ Responde clientes</h5>
                    <p class="text-secondary">Chat responde automaticamente</p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section text-center">
        <div class="container">
            <h2>Pronto para automatizar seu atendimento?</h2>
            <a href="{{route('cadastrese')}}" class="btn btn-main btn-lg mt-3">Começar agora</a>
        </div>
    </section>

</x-home>