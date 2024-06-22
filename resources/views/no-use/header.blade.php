<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>groenevingers</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="m-0 p-0">

    <!-- Grote afbeelding bovenaan de pagina -->

    <img src="/assets/img/pagebanner.png" alt="Page Banner" class="pagebanner" />

    <section>
        <div class="locations flex">
            <div class="location">
                <img src="/assets/img/locatie_1.png" alt="Locatie 1" class="rounded-lg">
                <p class="text-center"><b>nuenen</b></p>
            </div>
            <div class="location">
                <img src="/assets/img/locatie_2.png" alt="Locatie 2" class="rounded-lg">
                <p class="text-center"><b>centrum</b></p>
            </div>
            <div class="location">
                <img src="/assets/img/pagebanner.png" alt="Locatie 3" class="rounded-lg">
                <p class="text-center"><b>poort</b></p>
            </div>
        </div>
    </section>

    <div id="popupContainer">
        <img src="/assets/img/binnenkort.png" alt="Page Banner" class="popup" />
    </div>


    <header class="fixed top-0 left-0 right-0 z-50 bg-transparent text-white font-poppins">
        <nav class="border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-black-900" style="background-color: rgba(0, 0, 0, 0.00);">
          
            <div class="container justify-center flex flex-wrap items-center mx-auto">
          
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <a href="#">
                <img src="{{asset('assets/img/logo.png')}}" class="logo h-10 mr-3 sm:h-20" alt="Logo" />
            </a>
                <ul class="flex flex-col p-4  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <a href="{{'/home'}}" class="block py-2 pl-3 pr-4 text-lg rounded text-white  hover:text-green-200">Home</a>
                        </li>
                        <li>
                            <a href="{{'/webshop'}}" class="block py-2 pl-3 pr-4 text-lg rounded text-white  hover:text-green-200">Webshop</a>
                        </li>
                        <li>
                            <a href="{{'/over-ons'}}" class="block py-2 pl-3 pr-4 text-lg rounded text-white  hover:text-green-200">Over ons</a>
                        </li>


                        <li>
                            <a href="{{'/contact'}}" class=" contact block py-2 pl-5 pr-5 text-lg hover:bg-green-500 ">Contact</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">Home</a>
        <a href="#">Webshop</a>
        <a href="#">OverOns</a>
        <a href="#">Contact</a>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>