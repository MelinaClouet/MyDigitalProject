<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])
        @livewireStyles



    </head>

    <body class=" bg-beige" >
        @include('layouts.header', ['active' => 'reservation'])
        <h1 class="text-violet text-3xl font-bold mt-32 flex items-center justify-center montserrat md:text-5xl">RÉSERVATION</h1>

        <div class="flex items-center mt-14">
            <hr class="flex-grow h-1 bg-orangeClair">
            <div class="mx-4">
                <?php
                setlocale(LC_TIME, 'fr_FR.UTF-8'); // Définit la locale en français

                $mois = ucfirst(strftime('%B')); // Obtient le nom du mois en français avec une majuscule initiale

                // Remettre la locale par défaut
                setlocale(LC_TIME, 'C');

                $annee = date('Y');

                ?>
                <p class="text-orange font-semibold text-xl montserrat md:text-2xl">Planning du mois de {{$mois}} {{$annee}} </p>
            </div>
            <hr class="flex-grow h-1 bg-orangeClair">
        </div>
        <div class="flex w-full p-10">
            <div class="w-full " id="calendar"></div>
        </div>





        @include('layouts.footer')


    </body>
</html>

