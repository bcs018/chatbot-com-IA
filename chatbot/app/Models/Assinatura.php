<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }
}
