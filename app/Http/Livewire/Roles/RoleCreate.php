<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $name;
    public $array_permisos = [];

    public function render()
    {
        $permisos = Permission::all()->pluck('name', 'id');
        return view('livewire.roles.role-create', ['permisos' => $permisos]);
    }

    public function crearRole()
    {
        $this->validar();
        $rol = Role::create(['name' => $this->name]);
        $rol->permissions()->sync($this->array_permisos);
        return redirect()->route('usersList');
    }

    public function validar()
    {
        $mensajes = [
            'name.required' => 'Debe ingresar el nombre del rol.'
        ];
        $this->validate([
            'name' => 'required'
        ], $mensajes);
    }
}
