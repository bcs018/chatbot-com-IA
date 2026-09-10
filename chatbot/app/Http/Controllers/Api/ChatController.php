<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BotDomain;
use App\Models\Bot;
use App\Models\ChatSession;

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

        if (!$origin) 
        {
            return response()->json(['error' => 'Requisição inválida'], 403);
        }

        $host = parse_url($origin, PHP_URL_HOST);

        $allowed = BotDomain::where('bot_id', last($bot_id))
            ->where('domain', $host)
            ->exists();

        if (!$allowed) 
        {
            return response()->json(['error' => 'Não autorizado'], 403);
        }

        $dados = Bot::with('empresa')->where('id', last($bot_id))->get();

        dd($dados);

        $chatSession = new ChatSession();

        return response()->json(['session_id'=>$token]);
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
