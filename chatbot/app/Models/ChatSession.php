<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    protected $casts = ['expire_at' => 'datetime'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function bot()
    {
        return $this->belongsTo(Bot::class);
    }
}
