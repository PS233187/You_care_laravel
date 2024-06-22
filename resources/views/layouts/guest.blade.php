@extends('layouts.app-layout')
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <style>

.header-nav {
    pointer-events: none;
}

.header-nav li {
    cursor: not-allowed;
}

.header-nav .contact-btn {
    pointer-events: auto;
    cursor: pointer;
}

        </style>
        
{{-- login scherm --}}
<body class="bg-cover bg-center bg-no-repeat h-screen" style="background-image: url('assets/img/background_home.png');">
      
                
             
                <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center z-10" style="margin-top: -30px;">
                    <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg relative">
                       
                        <div class="flex justify-left mb-4">
                          
                        </div>
                        <div class="flex justify-center mb-4">
                           
                            <img src="assets/img/logo_youcare.png" alt="Login Icon" style="width: 120px; height: auto;">
                        </div>
                
                    
                        {{ $slot }}
                  
                
                
                
                
                
          
    </body>
    

</html>
