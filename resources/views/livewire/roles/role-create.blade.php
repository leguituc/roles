<div class="grid grid-cols-3">
    <div></div>
    <div>
        <x-jet-action-message on="creado">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2" role="alert">
                Se ha creado un nuevo rol.
            </div>
        </x-jet-action-message>
        <div class="flex mb-2">

            <div class="w-1/3">
                <label class="text-right" for="name">Nombre del Rol</label>
            </div>

            <div class="w-2/3">
                <input id="name" type="text" wire:model="name">
                <div>
                    @error('name')
                    <div class="italic text-xs text-red-900">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="flex mb-2">

            <div class="w-1/3">
                <label class="text-right" for="name">Permisos asignados</label>
            </div>

            <div class="w-2/3">
                @foreach($permisos as $id=>$permiso)
                    <div><input name="permisos[]" type="checkbox" value="{{$id}}"
                                wire:model="array_permisos"> {{$permiso}}</div>
                @endforeach
            </div>
        </div>
        <div class="flex mb-2">
            <div class="w-1/3"></div>
            <div class="w-2/3">
                <div>
                    <button class="boton_nuevo" wire:click="crearRole">CREAR ROL</button>
                </div>
            </div>
        </div>
    </div>
    <div></div>
</div>
