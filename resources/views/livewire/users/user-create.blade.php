<div class="grid grid-cols-3">
    <div></div>
    <div>
        <div></div>
        <div class="flex mb-2">
            <div class="w-1/3">
                <label class="text-right" for="name">Nombre del Usuario</label>
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
                <label class="text-right">Email del Usuario</label>
            </div>
            <div class="w-2/3">
                <input id="email" type="email" wire:model="email">
                <div>
                    @error('email')
                    <div class="italic text-xs text-red-900">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex mb-2">
            <div class="w-1/3">
                <label class="text-right">Contraseña</label>
            </div>
            <div class="w-2/3">
                <input id="password" type="password" wire:model="password">
                <div>
                    @error('password')
                    <div class="italic text-xs text-red-900">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex mb-2">
            <div class="w-1/3">
                <label class="text-right">Roles</label>
            </div>
            <div class="w-2/3">
                @foreach($roles as $id=>$rol)
                    <div><input name="roles[]" type="checkbox" value="{{$id}}" wire:model="array_roles"> {{$rol}}</div>
                @endforeach
            </div>
        </div>
        @foreach($array_roles as $row)
            <div>{{$row}}</div>
        @endforeach
        <div class="flex mb-2">
            <div class="w-1/3"></div>
            <div class="w-2/3">
                <button class="boton_nuevo" wire:click="store">CREAR USUARIO</button>
            </div>
        </div>
    </div>
    <div></div>
</div>
