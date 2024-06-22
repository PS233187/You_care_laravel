<div class="h-10 w-full flex items-center justify-center mxw:hidden bg-groenevingers">
    <div class="max-w-7xl min-w-[1280px] p-6">
        <ul class="flex">
            <li><a href="mailto:info@groenevingersshop.com" class="text-white text-sm"><i
                        class="fa-solid fa-envelope pr-2"></i>info@groenevingersshop.com</a></li>
            <li class="mx-4"><a href="tel:06-33024999" class="text-white text-sm"><i
                        class="fa-solid fa-phone pr-2"></i>06-33024999</a></li>

            <li class="sm ml-auto">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                @endif
            </li>
        </ul>
    </div>
</div>
<nav class="navbar max-w-7xl">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ '/home' }}">Home</a></li>
                <li><a>Webshop</a></li>
                <li><a href="{{ '/overons' }}">Over ons</a></li>
            </ul>
        </div>
        <a class="btn btn-ghost text-xl">
        <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="w-16 h-auto cursor-pointer"> 
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ '/home' }}">Home</a></li>
            <li><a>Webshop</a></li>
            <li><a href="{{ '/overons' }}">Over ons</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <a href="{{ '/contact' }}"
            class="btn bg-groenevingers text-white rounded-2xl hover:bg-groenevingers">Contact</a>
    </div>
</nav>




@auth
    @if (auth()->user()->hasRole('manager'))
        {{-- Toon de admin lay-out --}}
        {{-- Voeg hier de code toe voor de specifieke lay-out voor de admin --}}
    @elseif (auth()->user()->hasRole('admin'))
        {{-- Toon de admin lay-out --}}
        {{-- Voeg hier de code toe voor de specifieke lay-out voor de admin --}}
    @else
        {{-- Toon de standaard lay-out --}}
        {{-- Voeg hier de code toe voor de standaard lay-out --}}
    @endif
@else
    {{-- Toon de standaard lay-out --}}
    {{-- Voeg hier de code toe voor de standaard lay-out --}}
@endauth
