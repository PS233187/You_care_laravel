<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium" style="color: #d80000;">
            {{ __('Verwijder Account') }}
        </h2>
        <hr class="mt-2 border-white border-opacity-70">

        <p class="mt-1 text-sm text-gray">
            {{ __('Nadat je account is verwijderd, zullen al zijn bronnen en gegevens permanent worden verwijderd. Voordat je je account verwijdert, download alsjeblieft alle gegevens of informatie die je wilt behouden.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Verwijder Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-green-800 dark:text-green">
                {{ __('Weet u zeker dat u dit account wilt verwijderen?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input style="background-color: #ffffff; color: rgb(243, 243, 243)"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end" >
                <x-secondary-button style="background-color: #4CC9D1; color: rgb(255, 255, 255)" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
