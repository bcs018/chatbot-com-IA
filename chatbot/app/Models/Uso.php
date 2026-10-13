<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uso extends Model
{
    protected $table = 'uso';

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
