<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Rol bewerken</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-bold mb-1">Naam: <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ $role->name }}"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Machtigingen:</label>
                <div class="flex flex-wrap">
                    @foreach ($permissions as $permission)
                        <div class="w-1/3 mb-2">
                            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" class="border-gray-300 rounded-md px-2 py-1 mr-2"
                            @if(in_array($permission->id, $rolePermissions)) checked @endif>
                            <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Opslaan</button>
        </form>
    </div>
</x-app-layout>
