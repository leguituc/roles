<div class="grid grid-cols-3">
    <div></div>
    <div>
        <x-jet-confirmation-modal wire:model="confirmarBorrado">
            <x-slot name="title">
                Eliminar Usuario
            </x-slot>

            <x-slot name="content">
                ¿De verdad quiere borrar el usuario?
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmarBorrado')" wire:loading.attr="disabled">
                    Cerrar
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="eliminarUsuario" wire:loading.attr="disabled">
                    Eliminar
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

        <div class="text-center">
            <button class="boton_nuevo" wire:click="crearUsuario">Crear Usuario</button>
        </div>


        <table class="mx-auto">
            <tr>
                <th class="celda_cabecera">Nombre</th>
                <th class="celda_cabecera">Email</th>
                <th class="celda_cabecera">Roles</th>
                <th class="celda_cabecera" colspan="2"></th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td class="celda">{{$user->name}}</td>
                    <td class="celda">{{$user->email}}</td>
                    <td class="celda">
                        <ul>
                            @forelse($user->roles as $rol)
                                <li>- {{$rol->name}}</li>
                            @empty
                                <li>SIN ROL</li>
                            @endforelse
                        </ul>
                    </td>
                    <td class="celda">
                        <button class="boton_editar" wire:click="editarUsuario({{$user->id}})">EDITAR</button>
                    </td>
                    <td class="celda">
                        <button class="boton_eliminar" wire:click="pedirConfirmacion({{$user->id}})">ELIMINAR</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        {{$users->links()}}
    </div>
    <div></div>
</div>
