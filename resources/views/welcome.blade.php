<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('/resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body class="" style="background-color: #FAE8E0 ">
    @include ('layouts.header')
    <div class="h-1/2">
        <div class="flex justify-between mt-4">
            <div class="relative flex static w-1/3">
                <div class="absolute z-0 mt-10 -ml-24 h-52 w-52 transform rotate-45">
                    <img src="/assets/1.png" alt="My image" class="h-full w-full object-cover rounded-full">
                </div>
                <div class="absolute z-0 h-52 w-52 transform rotate-90 mt-5">
                    <img src="/assets/8.png" alt="My image" class="h-full w-full object-cover rounded-full">
                </div>

            </div>

            <div class="w-1/3">
                <div class="rounded-full overflow-hidden h-72 w-64 ">
                    <img src="/assets/enfantDos.jpg" alt="My image" class="h-full w-full object-cover rounded-full">
                </div>
            </div>



            <div class="w-1/3 mt-16">
                <div>
                    <p class="montserrat text-2xl text-center -ml-16">
                        MAYUDA QU’EST-CE <br> QUE C’EST ?
                    </p>
                </div>
                <div class="mt-7 mr-20 montserrat">
                    <p class="text-justify">
                        Entreprise spécialisée dans le bien-être de l’enfant, Mayuda accompagne l’enfant dans son parcours vers l’adolescence.
                    </p>
                </div>

                <div class="rounded-full overflow-hidden h-32 w-32 mt-20 ">
                    <img src="/assets/7.png" alt="My image" class="h-full w-full object-cover rounded-full">
                </div>

                <div class="rounded-full overflow-hidden h-32 w-32 -mt-24 ml-28">
                    <img src="/assets/8.png" alt="My image" class="h-full w-full object-cover rounded-full">
                </div>


            </div>
        </div>
    </div>

@include ('layouts.footer')
</body>
</html>
