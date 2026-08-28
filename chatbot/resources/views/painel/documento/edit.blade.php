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

            <div class="mt-5 mb-5">
                <strong>📚 Como cadastrar?</strong>
                <p>
                    Adicione informações uma por uma do seu negócio para que o bot possa responder seus clientes automaticamente<br> 
                    como horários, serviços e regras do seu negócio..
                </p>
                <hr>
                <p>
                    <strong>Exemplos:</strong>
                </p>
                <ul>
                    <li><b>Título:</b> Horário atendimento<br><b>&nbsp;Conhecimento:</b> Atendemos de segunda a sexta das 08h às 18h.</li>
                    <hr>
                    <li><b>Título:</b> Convênios<br><b>&nbsp;Conhecimento:</b> Aceitamos convênio Unimed, Bradesco e SulAmérica.</li>
                    <hr>
                    <li><b>Título:</b> Entregas<br><b>&nbsp;Conhecimento:</b> Entrega disponível apenas na cidade de São Paulo.</li>
                    <hr>
                    <li><b>Título:</b> Horário suporte<br><b>&nbsp;Conhecimento:</b> Suporte técnico via WhatsApp em horário comercial.</li>
                    <hr>
                    <li><b>Título:</b> Tipo Materiais<br><b>&nbsp;Conhecimento:</b> Trabalhamos somente com ferro e alumínio.</li>
                </ul>
                <hr>
                <p>
                    💡 Quanto mais claro e organizado, melhor será a resposta do seu bot.
                </p>
                <p>
                    💡 Adicione o máximo de informações possíveis, mas não repetidas.
                </p>
            </div>
        </div>
    </div>

</x-dashboard>
