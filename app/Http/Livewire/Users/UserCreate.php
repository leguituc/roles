<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $array_roles = [];

    public function render()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('livewire.users.user-create', compact('roles'));
    }

    public function store()
    {
        $this->validar();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => password_hash($this->password, PASSWORD_DEFAULT)
        ]);
        $user->roles()->sync($this->array_roles);
        $this->reset(['name', 'email', 'password']);
        return redirect()->route('users.index');
    }

    public function validar()
    {
        $mensajes = [
            'name.required' => 'Debe ingresar el nombre del usuario',
            'email.required' => 'Debe ingresar el email del usuario',
            'email.email' => 'El formato del correo no es correcto',
            'password.required' => 'Debe ingresar la contraseña del usuario'
        ];
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ], $mensajes);
    }
}
