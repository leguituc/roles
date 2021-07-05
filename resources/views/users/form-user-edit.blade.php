<form action="{{route('users.update',$user->id)}}" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="flex mb-2">
        <div class="w-1/3">
            <label class="text-right" for="name">Nombre del Usuario</label>
        </div>
        <div class="w-2/3">
            <input name="name" type="text" value="{{$user->name}}">
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
            <input name="email" type="email" value="{{$user->email}}">
            <div>
                @error('email')
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
            <div>
                <input name="roles[]" type="checkbox"
                       value="{{$id}}" {{$user->roles->contains($id)? 'checked' : '' }}> {{$rol}}
            </div>
            @endforeach
        </div>
    </div>

    <div class="flex mb-2">
        <div class="w-1/3"></div>
        <div class="w-2/3">
            <button class="boton_nuevo" type="submit">ACTUALIZAR USUARIO</button>
        </div>
    </div>
</form>
