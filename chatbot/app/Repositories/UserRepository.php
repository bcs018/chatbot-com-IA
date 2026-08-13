<?php 

namespace App\Repositories;

use App\Http\Requests\UsuarioRequest;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface{

    public function add(UsuarioRequest $request) : User
    {
        return DB::transaction(function() use($request){

            $empresa = Empresa::create([
                'nome'  => $request->empresa,
                'email' => $request->email,
                'senha' => '',
                'plano' => '',
            ]);

            $user = new User();
            $user->name     = $request->name;
            $user->password = Hash::make($request->password);
            $user->email    = $request->email;

            if (Auth::check() && Auth::user()->admin)
            {
                /**
                 * Se for adm pega a empresa do campo select da view
                 */
                $user->empresa_id = $request->empresa;

                /**
                 * Se for adm verifica se existe o campo admin na requisisao
                 * Se sim é porque esta selecionado como adm, senão default fica false
                 */
                if ($request->has('admin'))
                    $user->admin = 1;
            }
            else 
            {
                /**
                 * Senão pega a empresa do usuario
                 */
                $user->empresa_id = $empresa->id;
            }

            $user->save();

            return $user;
        },5);
    }
}