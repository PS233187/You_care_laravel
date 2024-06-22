    <!-- Sidebar -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-1/6 h-screen transition-transform -translate-x-full xl:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 text-white" style="background-color: #4CC9D1;">
            <a href="{{ route('dashboard') }}">
                <img src="../assets/img/logo_youcare.png" alt="Login Icon" style="width: 120px; height: auto;">
                <h1 class="text-4xl py-4 text-white">Dashboard</h1>
            </a>
            <div class="flex-col w-3/4">

                <ul class="menu flex-col text-lg">

                    @canany(['Rooster bekijken', 'Rooster aanmaken', 'Rooster bewerken', 'Rooster verwijderen'])
                    <li>
                        <a href="{{route('rooster.index')}}">
                            <i class="fa fa-calendar inline-block mr-2"></i> Rooster
                        </a>
                    </li> <br>
                    @endcanany


                    @canany(['Gebruiker bekijken', 'Gebruiker aanmaken', 'Gebruiker bewerken', 'Gebruiker verwijderen'])

                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-users inline-block mr-2"></i> Users
                        </a>
                    </li> <br>
                    @endcanany



                    <li>
                        <a href="#">
                            <i class="fa fa-users inline-block mr-2"></i> patiënten
                        </a>
                    </li> <br>
                    {{-- <li>
                        <a href="#">
                            <i class="fa fa-users inline-block mr-2"></i> Mantelzorger
                        </a>
                    </li> <br>  --}}

                    <br>
                    @canany(['Rol bekijken', 'Rol aanmaken', 'Rol bewerken', 'Rol verwijderen'])
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-cogs inline-block mr-2"></i> Rollen
                        </a>
                    </li> <br>
                    @endcanany

                    @canany(['Recht bekijken', 'Recht aanmaken', 'Recht bewerken', 'Recht verwijderen'])
                    <li>
                        <a href="{{ route('permissions.index') }}">
                            <i class="fa fa-key inline-block mr-2"></i> Rechten
                        </a>
                    </li> <br>
                    @endcanany

                </ul>
            </div>
        </div>
    </aside>






{{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.7/dist/alpine.min.js" defer></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
