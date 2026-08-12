<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    public function bot()
    {
        return $this->belongsTo(Bot::class);
    }

    public function embeddings()
    {
        return $this->hasMany(Embedding::class);
    }
}
