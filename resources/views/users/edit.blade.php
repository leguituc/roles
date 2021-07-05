<x-app-layout>
    <div class="mx-20 border border-2 border-blue-500">
        <div class="text-center">Editar Usuario</div>
        <div class="mt-10 mx-8">
            <div class="grid grid-cols-3">
                <div></div>
                <div>
                    @include('users.form-user-edit')
                </div>
                <div></div>
            </div>
        </div>
    </div>

</x-app-layout>
