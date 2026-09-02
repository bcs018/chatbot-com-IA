<x-dashboard title="Editar conhecimentos">

    <div class="pt-5 text-center">
        <h2>Editar conhecimentos</h2>
    </div>
    
    <div class="pt-5 d-flex justify-content-center">
        <div class="col-9">
            <form action="{{route('documento.update', $documento->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" 
                           class="form-control" 
                           id="titulo" 
                           value="{{old('titulo', $documento->titulo)}}" 
                           aria-describedby="titulo" 
                           name="titulo" 
                           placeholder="Informe o título do que se refere o conhecimento">
                </div>
                <div class="mb-3">
                    <label for="conteudo" class="form-label">Conhecimento</label>
                    <input type="text" 
                           class="form-control" 
                           id="conteudo" 
                           value="{{old('conteudo', $documento->conteudo)}}" 
                           aria-describedby="conteudo" 
                           name="conteudo" 
                           placeholder="Exemplo: Serviços da clínica, Sobre a empresa ou Atendimento ao cliente">
                </div>
                <div class="mb-3">
                    <label for="bot" class="form-label">Bot</label>
                    <select class="form-select" aria-label="Default select example" id="bot" name="bot">
                        @foreach ($bots as $bot)
                            <option value="{{$bot->id}}" {{($bot->id == $documento->bot_id) ? 'selected' : ''}}>{{$bot->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn bg-main-buttom">Editar</button>
            </form>
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

            <div class="container mt-5 mb-5">
                <h2>📚 Como funciona o cadastro de conhecimento?</h2>

                <div class="box">
                    Neste sistema, você cadastra informações no formato de <b>Pergunta</b> e <b>Resposta</b>.
                    O sistema junta esses dois campos e <b>alimenta a IA</b>, que será usado para busca
                    inteligente.
                </div>

                <h2 class="mt-4">🧠 Como você deve cadastrar</h2>

                <p>Preencha sempre assim:</p>

                <ul>
                    <li><span class="highlight">Pergunta:</span> intenção do usuário</li>
                    <li><span class="highlight">Resposta:</span> informação completa da base</li>
                </ul>

                <div class="card-explica">
                    <h3>📌 Exemplo 1</h3>
                    <b>Pergunta:</b> Qual é o horário de atendimento?<br>
                    <b>Resposta:</b> Atendemos de segunda a sexta das 08h às 18h.
                </div>

                <div class="card-explica">
                    <h3>📌 Exemplo 2</h3>
                    <b>Pergunta:</b> Vocês fazem entrega?<br>
                    <b>Resposta:</b> A entrega está disponível somente no estado de São Paulo.
                </div>

                <div class="card-explica">
                    <h3>📌 Exemplo 3</h3>
                    <b>Pergunta:</b> Quais são as formas de pagamento?<br>
                    <b>Resposta:</b> Parcelamos em até 10x sem juros ou 5% de desconto à vista.
                </div>

                <h2 class="mt-4">🔍 Como funciona na busca</h2>

                <div class="box">
                    Quando o usuário fizer uma pergunta, a IA faz a busca com o significado da pergunta dele com as
                    perguntas cadastrados.
                    Ele encontra o trecho mais parecido e gera a resposta final.
                </div>

                <div class="example">
                    Usuário: "Até que horas vocês funcionam?"  <br><br>

                    IA encontra:
                    "Qual é o horário de atendimento? Atendemos de segunda a sexta das 08h às 18h." <br><br>

                    IA responde:
                    "Nosso horário de atendimento é de segunda a sexta das 08h às 18h."
                </div>

                <h2 class="mt-4">🚀 Dica importante</h2>

                <ul>
                    <li>Use perguntas simples e diretas</li>
                    <li>Evite textos muito curtos na resposta</li>
                    <li>Não precisa cadastrar várias variações (a IA já entende isso)</li>
                    <li>Sempre pense: “como o usuário perguntaria isso?”</li>
                </ul>
            </div>
        </div>
    </div>

</x-dashboard>
