<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function bot()
    {
        return $this->belongsTo(Bot::class);
    }
}
