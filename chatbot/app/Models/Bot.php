<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function conversas()
    {
        return $this->hasMany(Conversa::class);
    }

    public function domains()
    {
        return $this->hasMany(BotDomain::class, 'bot_id');
    }
}
