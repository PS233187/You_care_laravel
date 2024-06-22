<x-app-layout>
    <div class="container mx-auto pr-10 pt-10">
        <table class="border-collapse border w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4 border-b border-r">Naam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td class="p-4 border-b border-r">{{ $permission->name }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div>

</x-app-layout>
