<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Plano;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function planos()
    {
        $planoGratuito = Plano::where('nome', 'Gratuito')->firstOrFail();
        $planoMax      = Plano::where('nome', 'Max')->firstOrFail();
        $planoGolden   = Plano::where('nome', 'Golden')->firstOrFail();

        return view('cadastro.planos', compact('planoGratuito', 'planoMax', 'planoGolden'));
    }

    public function selecionarPlano(Request $request)
    {
        $dados = $request->validate([
            'plano_id' => ['required', 'integer', 'exists:planos,id'],
        ]);

        $plano = Plano::findOrFail($dados['plano_id']);

        // Guarda apenas o ID do plano escolhido na sessão.
        $request->session()->put('cadastro.plano_id', $plano->id);

        return redirect()->route('cadastro.dados');
    }

    public function dados()
    {
        $plano = Plano::findOrFail(session('cadastro.plano_id'));

        return view('cadastro.dados', compact('plano'));
    }

    public function salvarDados(UsuarioRequest $request)
    {
        $request->session()->put('cadastro.dados', $request->all());

        dd(session('cadastro.plano_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
