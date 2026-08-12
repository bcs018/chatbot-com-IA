<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    public function conversa()
    {
        return $this->belongsTo(Conversa::class);
    }
}
