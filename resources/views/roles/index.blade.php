<x-app-layout>
    <div class="container mx-auto pr-10 pt-10">
        <table class="border-collapse border w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4 border-b border-r">Naam</th>
                    <th class="p-4 border-b">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="p-4 border-b border-r">{{ $role->name }}</td>

                        <td class="p-4 border-b flex justify-end">
                            <form action="{{ route('roles.edit', $role->id) }}" method="GET" class="flex items-center">
                                @csrf
                                <button type="submit" class="text-blue-500 px-2 py-1 rounded-lg hover:bg-blue-200">
                                    Bewerken
                                </button>
                            </form>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                class="flex items-center mr-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 px-2 py-1 rounded-lg hover:bg-red-200">
                                    Verwijderen
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div>
            <a href="{{ route('roles.create') }}"
                class="bg-green-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-lg">
                Creëren
            </a>
        </div>
    </div>
   
</x-app-layout>
