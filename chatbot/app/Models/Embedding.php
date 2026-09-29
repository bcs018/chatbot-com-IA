<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Embedding extends Model
{
    protected $casts = [
        'embedding' => 'array',
    ];
    
    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
