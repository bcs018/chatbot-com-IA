<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ChatSession;

class AuthChat
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $chatSession = ChatSession::with(['bot','empresa'])
                                  ->where('token', $request->bearerToken())
                                  ->first();

        if (!$chatSession)
        {
            return response()->json(['reply' => 'Chat fora do ar']);
        }

        if ($chatSession->expire_at->isPast()) 
        {
            return response()->json(['reply' => 'Sua sessão expirou, atualize a página e inicie um novo chat por favor.']);
        }

        if ($chatSession->empresa_id != $chatSession->bot->empresa_id)
        {
            return response()->json(['reply' => 'Chat fora do ar, problemas no servidor 1']);
        }
        
        $origin = $request->header('Origin');
        
        if ($origin)
        {
            $host = parse_url($origin, PHP_URL_HOST);

            $validDomain = $chatSession->bot->domains->where('domain', $host)->isNotEmpty();

            if (!$validDomain)
            {
                return response()->json(['reply' => 'Chat fora do ar, problemas no servidor 2']);
            }
        }
        
        return $next($request);
    }
}
