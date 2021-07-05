<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $confirmarBorrado = false;
    public $user_id;

    public function render()
    {
        $users = User::paginate(5);
        $users->load('roles');
        return view('livewire.users.user-list', ['users' => $users]);
    }

    public function crearUsuario()
    {
        return redirect('users/create');
    }

    public function editarUsuario($id)
    {
        return redirect("users/$id/edit");
    }

    public function pedirConfirmacion($id)
    {
        $this->user_id = $id;
        $this->confirmarBorrado = true;
    }

    public function eliminarUsuario()
    {
        User::destroy($this->user_id);
        $this->confirmarBorrado = false;
    }
}
