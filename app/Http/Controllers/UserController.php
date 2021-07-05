<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all()->pluck('name', 'id');
        return view('users.edit', compact(['id', 'user', 'roles']));
    }

    public function update(Request $request, $id)
    {
        $mensajes = [
            'name.required' => 'Debe ingresar el nombre del rol.',
            'email.required' => 'Debe ingresar el email del usuario.',
            'email.email' => 'El email parece no tener un formato correcto.',
        ];
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ], $mensajes);

        $user = User::where('id', $id)->first();
        $user->update($request->only(['name', 'email']));
        $user->roles()->sync($request->input('roles'));
        return redirect()->route('users.index');
    }
}
