<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BotDomain;
use App\Models\Bot;
use App\Models\ChatSession;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        return response()->json(['teste'=>'ok']);
    }

    public function session(Request $request)
    {
        $token = bin2hex(random_bytes(32));

        $expire = now()->addMinutes(30);

        $origin = $request->header('Origin');

        $bot_id = explode('_', $request->header('Data-Public-Key'));

        if (!$origin || $origin == 'null') 
        {
            return response()->json(['error' => 'Requisição inválida'], 403);
        }

        $host = parse_url($origin, PHP_URL_HOST);

        Log::alert($request->header);

        $allowed = BotDomain::where('bot_id', end($bot_id))
            ->where('domain', $host)
            ->exists();

        if (!$allowed) 
        {
            return response()->json(['error' => 'Não autorizado'], 403);
        }

        $dados = Bot::with('empresa')->findOrFail(end($bot_id));
        
        $session = ChatSession::where('bot_id', end($bot_id))
                              ->where('empresa_id', $dados->empresa->id)
                              ->where('ip', $request->ip())
                              ->orderBy('created_at', 'desc')
                              ->first();
        
        if (!$session || $session->expire_at->isPast())
        {
            $chatSession = new ChatSession();
            $chatSession->token      = $token;
            $chatSession->ip         = $request->ip();
            $chatSession->empresa_id = $dados->empresa->id;
            $chatSession->bot_id     = $dados->id;
            $chatSession->expire_at  = $expire;
            $chatSession->save();

            return response()->json(['session_id' => $token]);
        }

        return response()->json(['session_id' => $session->token]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
