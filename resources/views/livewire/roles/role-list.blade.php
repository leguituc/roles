<div class="grid grid-cols-3">
    <div></div>
    <div>
        <x-jet-confirmation-modal wire:model="confirmarBorrado">
            <x-slot name="title">
                Eliminar Rol
            </x-slot>

            <x-slot name="content">
                ¿De verdad quiere borrar el rol?
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmarBorrado')" wire:loading.attr="disabled">
                    Cerrar
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="eliminarRole" wire:loading.attr="disabled">
                    Eliminar
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

        <div class="text-center">
            <button class="boton_nuevo" wire:click="crearRole">Crear Rol</button>
        </div>


        <table class="mx-auto">
            <tr>
                <th class="celda_cabecera">Nombre</th>
                <th class="celda_cabecera">Permisos asignados</th>
                <th class="celda_cabecera" colspan="2"></th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td class="celda">{{$role->name}}</td>
                    <td class="celda">
                        <ul>
                            @forelse ($role->permissions as $row)
                                <li>- {{$row->name}}</li>
                            @empty
                                SIN PERMISOS
                            @endforelse
                        </ul>
                    </td>
                    <td class="celda">
                        <button class="boton_editar" wire:click="editarRole({{$role->id}})">EDITAR</button>
                    </td>
                    <td class="celda">
                        <button class="boton_eliminar" wire:click="pedirConfirmacion({{$role->id}})">ELIMINAR</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        {{$roles->links()}}
    </div>
    <div></div>
</div>
