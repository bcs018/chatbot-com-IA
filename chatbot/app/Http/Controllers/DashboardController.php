<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bot;
use App\Models\Mensagem;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qtdBots = Bot::where('empresa_id', auth()->user()->empresa_id)->count();
        $bot = Bot::with(['conversas.mensagens', 'documentos'])->where('empresa_id', auth()->user()->empresa_id)->get();

        $mensagensShow = Mensagem::whereHas('conversa.bot', function ($q) {
            $q->where('empresa_id', auth()->user()->empresa_id);
        })
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();

        $qtdConversas  = 0;
        $qtdDocumentos = 0;
        $qtdMensagens  = 0;

        foreach ($bot as $b)
        {
            foreach ($b->conversas as $conversa)
            {
                foreach ($conversa->mensagens as $mensagens)
                {
                    if ($mensagens->tipo == 'bot')
                        $qtdMensagens++;   
                }

                $qtdConversas++;
            }
                        
            foreach ($b->documentos as $documento)
                $qtdDocumentos++;
        }

        $dados = [
            'qtdBots'       => $qtdBots, 
            'qtdConversas'  => $qtdConversas, 
            'qtdDocumentos' => $qtdDocumentos,
            'qtdMensagens'  => $qtdMensagens,
            'mensagens'     => $mensagensShow
        ];

        return view ('painel.index', $dados);
    }

    public function listBots()
    {
        $bots = Bot::select('nome', 'id')->where('empresa_id', auth()->user()->empresa_id)->get();

        return response()->json($bots);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
