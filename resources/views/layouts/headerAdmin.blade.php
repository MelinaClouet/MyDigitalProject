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
<header class="fixed top-0 w-full z-50">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <nav class="bg-white border-gray-200">
        <div class="bg-gray-100 h-screen flex justify-start w-full">
            <div class="ml-6 flex w-32 flex-col items-center space-y-10 py-6">
                <div class="flex items-center justify-center rounded-md bg-white p-4">
                    <img src="/assets/logo.png" />
                </div>
                <div class="bg-white rounded h-full w-full flex flex-col items-center justify-start">
                    <ul class="space-y-4">
                        <li class="mt-4">
                            <a href="#" class="">Rendez-vous</a>
                        </li>
                        <li>
                            <a href="#" class="">Utilisateurs</a>
                        </li>
                        <li>
                            <a href="#" class="">Formations</a>
                        </li>
                        <li>
                            <a href="#" class="">Services</a>
                        </li>
                        <li>
                            <a href="#" class="">Calendrier</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </nav>
</header>
</body>

</html>
