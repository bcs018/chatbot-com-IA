<x-home title="Cadastre-se">

    <section class="py-5">
        <div class="container py-lg-4">

            <!-- Cabeçalho -->
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Escolha o plano ideal para seu negócio</h2>
                <p class="text-secondary mb-0">
                    Comece testando gratuitamente e evolua conforme seu negócio crescer.
                </p>
            </div>

            <div class="row g-4 align-items-stretch">

                <!-- PLANO GRATUITO -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border shadow-sm rounded-4">
                        <div class="card-body p-4 d-flex flex-column">

                            <span class="badge text-bg-secondary align-self-start mb-3">
                                Para experimentar
                            </span>

                            <h3 class="fw-bold mb-2 text-light">Gratuito</h3>

                            <div class="mb-1">
                                <span class="display-6 fw-bold text-light">10.000</span>
                                <span class="text-secondary">tokens</span>
                            </div>

                            <p class="text-secondary small mb-4">
                                Cota única por empresa
                            </p>

                            <hr>

                            <p class="fw-semibold mb-3 text-secondary">
                                Ideal para conhecer o InteliChat
                            </p>

                            <ul class="list-unstyled flex-grow-1 mb-4">
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-success">✓</span>
                                    <span class="text-light">Teste a instalação do chatbot.</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-success">✓</span>
                                    <span class="text-light">Teste perguntas e respostas com sua base de
                                        conhecimento.</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-success">✓</span>
                                    <span class="text-light">1 chatbot</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-success">✓</span>
                                    <span class="text-light">Limite reduzido de documentos na base de
                                        conhecimento</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-success">✓</span>
                                    <span class="text-light">Recursos básicos</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-success">✓</span>
                                    <span class="text-light">Sem suporte prioritário</span>
                                </li>
                            </ul>

                            <div class="alert alert-light border small">
                                Este plano não renova mensalmente. Ao consumir os
                                tokens disponíveis, será necessário contratar um plano.
                            </div>

                            <form action="{{ route('cadastro.plano') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plano_id" value="{{ $planoGratuito->id }}">

                                <button type="submit" class="btn btn-outline-secondary w-100 py-2">
                                    Começar gratuitamente
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PLANO MAX -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border border-primary border-2 shadow rounded-4">
                        <div class="card-body p-4 d-flex flex-column">

                            <span class="badge text-bg-primary align-self-start mb-3">
                                Mais popular
                            </span>

                            <h3 class="fw-bold mb-2 text-light">Max</h3>

                            <div class="mb-1">
                                <span class="display-6 fw-bold text-light">R$ 49,90</span>
                                <span class="text-secondary">/mês</span>
                            </div>

                            <p class="text-primary fw-semibold mb-4">
                                500.000 tokens/mês
                            </p>

                            <hr>

                            <p class="fw-semibold mb-3 text-secondary">
                                Para pequenos negócios que já querem usar o chatbot.
                            </p>

                            <ul class="list-unstyled flex-grow-1 mb-4">
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-primary">✓</span>
                                    <span class="text-light">Tudo que tem no Gratuito</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-primary">✓</span>
                                    <span class="text-light">Até 3 chatbots</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-primary">✓</span>
                                    <span class="text-light">Base de conhecimento ampliada</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-primary">✓</span>
                                    <span class="text-light">Instalação em site próprio</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-primary">✓</span>
                                    <span class="text-light">Histórico de conversas</span>
                                </li>
                            </ul>

                            <form action="{{ route('cadastro.plano') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plano_id" value="{{ $planoMax->id }}">

                                <button type="submit" class="btn btn-primary w-100 py-2">
                                    Contratar plano Max
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PLANO GOLDEN -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border border-warning shadow-sm rounded-4">
                        <div class="card-body p-4 d-flex flex-column">

                            <span class="badge text-bg-warning align-self-start mb-3">
                                Mais completo
                            </span>

                            <h3 class="fw-bold mb-2 text-light">Golden</h3>

                            <div class="mb-1">
                                <span class="display-6 fw-bold text-light">R$ 99,90</span>
                                <span class="text-secondary">/mês</span>
                            </div>

                            <p class="fw-semibold mb-4" style="color: #d69f06;">
                                2.000.000 tokens/mês
                            </p>

                            <hr>

                            <p class="fw-semibold mb-3 text-secondary">
                                Para empresas com mais visitantes e conversas.
                            </p>

                            <ul class="list-unstyled flex-grow-1 mb-4">
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-warning">✓</span>
                                    <span class="text-light">Tudo que tem no Gratuito e Max</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-warning">✓</span>
                                    <span class="text-light">Até 10 chatbots</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-warning">✓</span>
                                    <span class="text-light">Base de conhecimento ilimitada</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-warning">✓</span>
                                    <span class="text-light">Relatórios de uso</span>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <span class="text-warning">✓</span>
                                    <span class="text-light">Suporte prioritário</span>
                                </li>
                            </ul>

                            <form action="{{ route('cadastro.plano') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plano_id" value="{{ $planoGolden->id }}">

                                <button type="submit" class="btn btn-warning w-100 py-2">
                                    Contratar plano Golden
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <p class="text-center text-secondary small mt-4 mb-0">
                Os limites de uso são aplicados conforme as regras de cada plano.
            </p>

        </div>
    </section>

</x-home>
