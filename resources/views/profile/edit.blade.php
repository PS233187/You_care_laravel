
<x-app-layout>

    <div class="py-12 flex justify-center items-center" style="background-image: url('assets/img/background_home.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-green-200 shadow-lg sm:rounded-lg" style="background-color: #ffffff;">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-green-200 shadow-lg sm:rounded-lg" style="background-color: #ffffff;">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-green-200 shadow-lg sm:rounded-lg" style="background-color: #ffffff;">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
