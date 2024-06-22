<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <!-- Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')

    <style>
        html, body {
            height: 100%;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-cover bg-center bg-no-repeat h-screen" style="background-image: url('assets/images/background_home.png');">
    <header class="flex justify-end p-4 relative z-10">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="rounded-md px-3 text-[#4CC9D1] py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-[#4CC9D1] ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                @endif
            @endauth
        @endif
    </header>
   
    <div class="flex flex-col justify-center items-center z-0" style="height: 720px;">
        <div class="flex flex-col items-center relative z-10">
            <a href="/home">
                <img src="{{ asset('assets/images/logo_youcare.png') }}" alt="YouCare Logo" class="w-50 h-20" />
            </a>
            <div class="w-full text-center sm:max-w-md mt-6 px-10 py-4 bg-white text-[#4CC9D1] shadow-md overflow-hidden sm:rounded-lg">
                <h1 class="text-3xl font-bold text-center mb-2">Welcome</h1>
                <p>Welcome to Youcare Planning,</p>
                <p>your streamlined agenda system designed</p>
                <p>for both patients and nurses,</p>
                <p>making scheduling easier than ever!</p>
            </div>
        </div>
    </div>
</body>
</html>
