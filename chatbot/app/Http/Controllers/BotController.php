<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Http\Request;
use  App\Http\Requests\BotRequest;
use App\Models\Bot;
use App\Models\BotDomain;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $bots = Bot::where('empresa_id', auth()->user()->empresa_id)->get();
        
        $bots = Bot::with('domains')->where('empresa_id', auth()->user()->empresa_id)->get();

        return view ('painel.bot.index', compact('bots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('painel.bot.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BotRequest $request)
    {
        $bot = new Bot();
        $bot->nome = $request->nome;
        $bot->empresa_id = auth()->user()->empresa_id;

        if ($request->has('ativo'))
            $bot->ativo = 1;
        else 
            $bot->ativo = 0;

        $bot->prompt_base = 'Você é um assistente virtual da empresa '.auth()->user()->empresa->nome
        .' Seu objetivo é responder clientes com clareza e rapidez. '
        .'Regras: '
        .'- Use apenas o contexto fornecido '
        .'- Não invente informações '
        .'- Seja educado, direto e divertido '
        .'- Use emojis relacionado a suas respostas '
        .'- Se não souber, diga apenas que não possui essa informação '
        .'Estilo: '
        .'- Linguagem simples '
        .'- Frases curtas';
        
        $bot->save();

        $host = parse_url($request->domain, PHP_URL_HOST);

        if ($host == null)
            $host = $request->domain;

        $botDomain = new BotDomain();
        $botDomain->domain = $host;
        $botDomain->bot_id = $bot->id;
        $botDomain->save();

        return redirect()->back()->with('success', 'Bot incluido com sucesso');
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
        $bots = Bot::with('domains')
                    ->where('empresa_id', auth()->user()->empresa_id)
                    ->where('id', $id)
                    ->firstOrFail();

        return view('painel.bot.edit', compact('bots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BotRequest $request, string $id)
    {
        $bot = Bot::with('empresa')->find($id);
        $bot->nome = $request->nome;
        $bot->empresa_id = auth()->user()->empresa_id;

        if ($request->has('ativo'))
            $bot->ativo = 1;
        else 
            $bot->ativo = 0;

        $bot->save();

        $host = parse_url($request->domain, PHP_URL_HOST);

        if ($host == null)
            $host = $request->domain;

        $botDomain = BotDomain::where('bot_id', $id)->first();

        if($botDomain == null)
            $botDomain = new BotDomain();

        $botDomain->domain = $host;
        $botDomain->bot_id = $id;
        $botDomain->save();

        return redirect()->back()->with('success', 'Bot atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bot = Bot::find($id);
        $bot->delete();

        return redirect()->back()->with('success', 'Bot excluido com sucesso');
    }
}
