<?php 

namespace App\Repositories;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;

interface UserRepositoryInterface
{
    public function add(UsuarioRequest $request): User;
}