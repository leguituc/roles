<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function create()
    {
        return view('roles.create');
    }

    public function edit($id)
    {
        $permisos = Permission::all()->pluck('name', 'id');
        $rol = Role::where('id', $id)->first();
        $rol->load('permissions');
        return view('roles.edit', compact('id', 'permisos', 'rol'));
    }

    public function update(Request $request, $id)
    {
        $mensajes = [
            'name.required' => 'Debe ingresar el nombre del rol.'
        ];
        $validated = $request->validate([
            'name' => 'required'
        ], $mensajes);

        $role = Role::where('id', $id)->first();
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permisos'));
        return redirect()->route('roles.index');
    }
}
