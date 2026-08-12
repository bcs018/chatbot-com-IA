<?php

namespace App\Models;

use Database\Factories\EmpresaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /** @use HasFactory<EmpresaFactory> */
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        "nome",
        "email",
        "senha",
        "plano"
    ];
}
