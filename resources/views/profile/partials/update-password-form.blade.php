<section>
    <header>
        <h2 class="text-lg font-medium" style="color: #4CC9D1">
            {{ __('Update Wachtwoord') }}
        </h2>
        <hr class="mt-2 border-white border-opacity-70">

        <p class="mt-1 text-sm text-gray">
            {{ __('Zorg ervoor dat je account een lang, willekeurig wachtwoord gebruikt om veilig te blijven.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Huidig Wachtwoord')" style="color: gray" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" style="background-color: #ffffff;" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Nieuw Wachtwoord')" style="color: gray" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" style="background-color: #ffffff;" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Bevestig Wachtwoord')" style="color: gray" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" style="background-color: #ffffff;" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button style="background-color: #4CC9D1; color: rgb(255, 255, 255)">{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
