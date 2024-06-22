<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Gebruiker toevoegen</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="mb-4">
                <label for="name" class="block font-bold mb-1">Naam: <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" class="border-gray-300 rounded-md px-4 py-2 w-full"
                    required value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="surname" class="block font-bold mb-1">Achternaam:</label>
                <input type="text" name="surname" id="surname" class="border-gray-300 rounded-md px-4 py-2 w-full"
                    value="{{ old('surname') }}">
                @error('surname')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block font-bold mb-1">Telefoonnummer:</label>
                <input type="tel" name="phone_number" id="phone_number"
                    class="border-gray-300 rounded-md px-4 py-2 w-full" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block font-bold mb-1">Adres:</label>
                <input type="text" name="address" id="address" class="border-gray-300 rounded-md px-4 py-2 w-full"
                    value="{{ old('address') }}">
                @error('address')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="postal_code" class="block font-bold mb-1">Postcode:</label>
                <input type="text" name="postal_code" id="postal_code"
                    class="border-gray-300 rounded-md px-4 py-2 w-full" value="{{ old('postal_code') }}">
                @error('postal_code')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="city" class="block font-bold mb-1">Stad:</label>
                <input type="text" name="city" id="city" class="border-gray-300 rounded-md px-4 py-2 w-full"
                    value="{{ old('city') }}">
                @error('city')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block font-bold mb-1">E-mail: <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" class="border-gray-300 rounded-md px-4 py-2 w-full"
                    required value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block font-bold mb-1">Wachtwoord: <span
                        class="text-red-500">*</span></label>
                <input type="password" name="password" id="password"
                    class="border-gray-300 rounded-md px-4 py-2 w-full" required>
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block font-bold mb-1">Rol:</label>
                {{-- <select name="role" id="role" class="border-gray-300 rounded-md px-4 py-2 w-full">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select> --}}
                @foreach ($roles as $role)
                    <div class="flex flex-col justify-cente">
                        <div class="flex flex-col">
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]"
                                    value="{{ $role->id }}"><span
                                    class="ml-2 text-gray-700">{{ $role->name }}</span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Opslaan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
