<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Bot;
use App\Http\Requests\DocumentoRequest;
use App\Models\Embedding;
use OpenAI;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conhecimentos = Bot::with('documentos')->where('empresa_id', auth()->user()->empresa_id )->get();

        // dd($conhecimentos);

        return view ('painel.documento.index', compact('conhecimentos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bots = Bot::where('empresa_id', auth()->user()->empresa_id)->get();

        return view ('painel.documento.create', compact('bots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentoRequest $request)
    {
        $documento = new Documento();
        $documento->titulo   = $request->titulo;
        $documento->conteudo = $request->conteudo;
        $documento->bot_id   = $request->bot;
        $documento->save();

        $client = OpenAI::client(config('app.api_openai'));

        $response = $client->embeddings()->create([
            'model' => 'text-embedding-3-small',
            'input' => $request->conteudo
        ]);
                
        $embedding = json_encode($response->embeddings[0]->embedding);

        $embedding = new Embedding();
        $embedding->documento_id = $documento->id;
        $embedding->chunk = $request->conteudo;
        $embedding->embedding = json_encode($response->embeddings[0]->embedding);
        $embedding->save();

        return redirect()->back()->with('success', 'Conhecimento cadastrado com sucesso');
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

        $documento = Documento::where('id', $id)
        ->whereHas('bot', function ($q) {
            $q->where('empresa_id', auth()->user()->empresa_id);
        })
        ->firstOrFail();

        $bots = Bot::where('empresa_id', auth()->user()->empresa_id)->get();

        return view('painel.documento.edit', ['documento' => $documento, 'bots' => $bots]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentoRequest $request, string $id)
    {
        $documento = Documento::findOrFail($id);
        $documento->titulo   = $request->titulo;
        $documento->conteudo = $request->conteudo;
        $documento->bot_id   = $request->bot;
        $documento->save();

        return redirect()->back()->with('success', 'Conhecimento alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documento = Documento::find($id);
        $documento->delete();

        return redirect()->back()->with('success', 'Conhecimento excluido com sucesso');
    }
}
