<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all();

        return view('painel.cadastrarUsuario', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;

        if (Auth::user()->admin)
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
            $user->empresa_id = Auth::user()->empresa_id;
        }

        $user->save();

        return redirect()->route('usuario.create')->with('success', 'Usuário cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
