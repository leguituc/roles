<div class="mt-10 mx-8">
    <div class="grid grid-cols-3">
        <div></div>
        <div>
            <form action="{{route('roles.update',$rol->id)}}" method="post">
                @csrf
                {{method_field('PATCH')}}
                <div class="flex mb-2">

                    <div class="w-1/3">
                        <label class="text-right" for="name">Nombre del Rol</label>
                    </div>

                    <div class="w-2/3">
                        <input name="name" type="text" value="{{$rol->name}}">
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
                        @foreach($permisos as $id => $permiso)
                            <div>
                                <input name="permisos[]" type="checkbox"
                                       value="{{$id}}" {{$rol->permissions->contains($id) ? 'checked' : ''}}> {{$permiso}}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex mb-2">
                    <div class="w-1/3"></div>
                    <div class="w-2/3">
                        <div>
                            <button class="boton_nuevo" type="submit">EDITAR ROL</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div></div>
    </div>
</div>
