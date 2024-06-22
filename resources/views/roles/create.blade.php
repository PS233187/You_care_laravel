<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Rol toevoegen</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-bold mb-1">Naam: <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" class="border-gray-300 rounded-md px-4 py-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Machtigingen:</label>
                <div class="flex flex-wrap">
                    @foreach ($permissions as $permission)
                        <div class="w-1/3 mb-2">
                            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" class="border-gray-300 rounded-md px-2 py-1 mr-2">
                            <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Opslaan</button>
            </div>
        </form>
    </div>
</x-app-layout>
