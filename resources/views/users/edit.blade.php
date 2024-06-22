<x-app-layout>

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Medewerker bewerken</h1>

        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-bold mb-1">Naam: <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ $user->name }}"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="surename" class="block font-bold mb-1">Achternaam:</label>
                <input type="text" id="surename" name="surename" value="{{ $user->surename }}"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block font-bold mb-1">Telefoonnummer:</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number }}"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="address" class="block font-bold mb-1">Adres:</label>
                <input type="text" id="address" name="address" value="{{ $user->address }}"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="postal_code" class="block font-bold mb-1">Postcode:</label>
                <input type="text" id="postal_code" name="postal_code" value="{{ $user->postal_code }}"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="city" class="block font-bold mb-1">Stad:</label>
                <input type="text" id="city" name="city" value="{{ $user->city }}"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block font-bold mb-1">E-mail: <span class="text-red-500">*</span></label>
                <input type="email" id="email" name="email" value="{{ $user->email }}"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="password" class="block font-bold mb-1">Wachtwoord:</label>
                <input type="password" id="password" name="password"
                    class="border-gray-300 rounded-md px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="role" class="block font-bold mb-1">Rol:</label>
                @foreach ($roles as $role)
                <div class="flex flex-col justify-cente">
                    <div class="flex flex-col">
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                name="roles[]" value="{{ $role->id }}"
                                @if (count($user->roles->where('id', $role->id))) checked @endif><span
                                class="ml-2 text-gray-700">{{ $role->name }}</span>
                        </label>
                    </div>
                </div>
            @endforeach
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Opslaan</button>
        </form>
    </div>
</x-app-layout>
