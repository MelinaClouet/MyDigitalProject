<!DOCTYPE html>
<html lang="en" class="sm:scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MAYUDA</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/main.js" defer></script>
</head>

<body class="min-h-screen bg-slate-50 dark:bg-black dark:text-white">
<header class=" fixed top-0 w-full z-50">
    @vite(['resources/css/app.css','resources/js/app.js'])


    <nav class="bg-white border-beige dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/assets/logo.png" class="h-20" alt="Flowbite Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-orange rounded-lg md:hidden hover:bg-beige focus:outline-none focus:ring-2 focus:ring-orange dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 border border-beige rounded-lg bg-beige md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        @if($active == 'home')
                            <a id="home" href="/" class="block py-2 px-3 text-orange rounded  md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">ACCUEIL</a>
                        @else
                            <a id="home" href="/" class="block py-2 px-3 text-gray-900 rounded hover:bg-orangeClair md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-orange dark:hover:text-white md:dark:hover:bg-transparent ">ACCUEIL</a>

                        @endif
                    </li>
                    <li> @if($active == 'about')
                            <a id="about" href="/about" class="block py-2 px-3 text-orange rounded  md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">À PROPOS</a>
                        @else
                            <a id="about" href="/about" class="block py-2 px-3 text-gray-900 rounded hover:bg-orangeClair md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">À PROPOS</a>

                        @endif
                    </li>
                    <li>
                        @if($active == 'services')
                            <a id="services" href="/services" class="block py-2 px-3 text-orange rounded  md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">SERVICES</a>

                        @else
                        <a id="services" href="/services" class="block py-2 px-3 text-gray-900 rounded hover:bg-orangeClair md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">SERVICES</a>
                        @endif
                    </li>
                    <li>
                        @if($active == 'reservation')
                            <a id="reservation" href="/reservation" class="block py-2 px-3 text-orange rounded  md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">CALENDRIER</a>
                        @else
                        <a id="reservation" href="/reservation" class="block py-2 px-3 text-gray-900 rounded hover:bg-orangeClair md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent {{ $active == 'reservation' ? 'active-link' : '' }}">CALENDRIER</a>
                        @endif
                    </li>
                    @if(session('me') && session('me')->status == '1')
                        @if($active == 'rendezVous')
                            <a id="rendezVous" href="/rendezVous" class="block py-2 px-3 text-orange rounded  md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">RÉSERVATION</a>
                        @else
                            <a id="rendezVous" href="/rendezVous" class="block py-2 px-3 text-gray-900 rounded hover:bg-orangeClair md:hover:bg-transparent md:border-0 md:hover:text-orange md:p-0 dark:text-white md:dark:hover:text-orange dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent {{ $active == 'rendezVous' ? 'active-link' : '' }}">RÉSERVATION</a>
                        @endif
                    @endif

                    <div class="flex items-center justify-between">
                        <a href="/login" class="mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                <path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                                </path>
                            </svg>
                        </a>
                        @if(session('me'))
                            <li class="flex items-center">
                                <a href="/logout" class="mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                        <path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path>
                                        <path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: rgba(11, 11, 11, 1);">
                                <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z">
                                </path>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: rgba(11, 11, 11, 1);">
                                <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z">
                                </path>
                            </svg>
                        </li>
                    </div>


                </ul>
            </div>
        </div>
    </nav>
</header>
</body>
</html>

<script>

</script>
