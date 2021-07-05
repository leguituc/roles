<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{

    public $confirmarBorrado = false;
    public $role_id;

    public function render()
    {
        $roles = Role::paginate(5);
        return view('livewire.roles.role-list', ['roles' => $roles]);
    }

    public function crearRole()
    {
        return redirect('roles/create');
    }

    public function pedirConfirmacion($role_id)
    {
        $this->role_id = $role_id;
        $this->confirmarBorrado = true;
    }

    public function eliminarRole()
    {
        Role::destroy($this->role_id);
        $this->confirmarBorrado = false;
    }
}
