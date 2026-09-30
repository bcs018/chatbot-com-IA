<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BotDomain;
use App\Models\Bot;
use App\Models\ChatSession;
use App\Models\Embedding;
use Illuminate\Support\Facades\Log;
use OpenAI;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $chatSession = ChatSession::with(['bot','empresa'])
                                  ->where('token', $request->bearerToken())
                                  ->first();

        // Gera embedding da pergunta
        $client = OpenAI::client(config('app.api_openai'));

        $response = $client->embeddings()->create([
            'model' => 'text-embedding-3-small',
            'input' => $request->message
        ]);
        
        $embeddingPergunta = $response->embeddings[0]->embedding;

        $rows = Embedding::select('embedding', 'chunk')
                         ->whereHas('documento', function ($q) use ($chatSession) {
                            $q->where('bot_id', $chatSession->bot_id);
                         })
                         ->get();
 
        $melhor = null;
        $maiorScore = -1;

        foreach ($rows as $row) 
        {
            $embeddingBanco = $row['embedding'];

            $score = $this->cosineSimilarity($embeddingPergunta, $embeddingBanco);

            if ($score > $maiorScore) 
            {
                $maiorScore = $score;
                $melhor = $row['chunk'];
            }
        }

        Log::alert("Melhor escolha: $melhor");

        $response = $client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $chatSession->bot->prompt_base . ' Contexto: ' . $melhor
                ],
                [
                    'role' => 'user',
                    'content' => $request->message
                ]
            ]
        ]);

        Log::alert('Resposta IA: '.$response->choices[0]->message->content);

        return response()->json(['reply'=>$response->choices[0]->message->content]);
    }

    private function cosineSimilarity($a, $b) 
    {
        $dot = 0;
        $normA = 0;
        $normB = 0;

        $a = $this->normalizeEmbedding($a);
        $b = $this->normalizeEmbedding($b);

        for ($i = 0; $i < count($a); $i++) {
            $dot += (float)$a[$i] * (float)$b[$i];
            $normA += $a[$i] * $a[$i];
            $normB += $b[$i] * $b[$i];
        }
        
        return $dot / (sqrt($normA) * sqrt($normB));
    }

    private function normalizeEmbedding($embedding)
    {
        if (is_string($embedding)) {
            $embedding = json_decode($embedding, true);
        }

        return array_map('floatval', $embedding);
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

        $allowed = BotDomain::where('bot_id', end($bot_id))
            ->where('domain', $host)
            ->exists();

        // if (!$allowed) 
        // {
        //     return response()->json(['error' => 'Não autorizado'], 403);
        // }

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
