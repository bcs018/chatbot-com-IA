<x-dashboard title="Perfil">
    <div class="pt-5 text-center">
        <h2>Perfil</h2>
    </div>
    
    <div class="pt-5 d-flex justify-content-center">

        <div class="col-12 col-lg-6">
            <div class="text-center">
                <img src="{{asset('images/user.png')}}" class="rounded-circle w-25 h-25" alt="...">
                <h5 class="mt-3 mb-5">{{ auth()->user()->name ?? 'Usuário' }}</h5>
            </div>

            <div class="container">
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="text-muted small">E-mail</div>
                        <div class="fw-semibold">{{ auth()->user()->email }}</div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="text-muted small">Empresa</div>
                        <div class="fw-semibold">29</div>
                    </div> --}}

                    <div class="col-md-6">
                        <div class="text-muted small">Empresa</div>
                        <div class="fw-semibold">{{ auth()->user()->empresa->nome }}</div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="text-muted small">Telefone</div>
                        <div class="fw-semibold">(19) 99999-9999</div>
                    </div> --}}

                </div>
            </div>


            {{-- <div class="container">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nome" class="fw-bold col">E-mail</label>
                        <div class="">{{ auth()->user()->email }}</div>
                    </div>
                    <div class="col">
                        <div></div>
                        <a href="">Editar</a>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <label for="nome" class="fw-bold">Empresa</label>
                        <div>{{ auth()->user()->empresa->nome }}</div>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
</x-dashboard>