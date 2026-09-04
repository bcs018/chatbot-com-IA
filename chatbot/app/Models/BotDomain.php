<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotDomain extends Model
{
    public function bot()
    {
        return $this->belongsTo(Bot::class);
    }
}
