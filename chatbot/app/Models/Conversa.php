<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversa extends Model
{
    public function bot()
    {
        return $this->belongsTo(Bot::class);
    }

    public function mensagens()
    {
        return $this->hasMany(Mensagem::class);
    }
}
