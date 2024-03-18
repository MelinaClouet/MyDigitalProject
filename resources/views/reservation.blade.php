<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])
        @livewireStyles

        <script src="/assets/js/calendar.js"></script>


    </head>

    <body class=" bg-beige" >
        @include('layouts.header')
        <h1 class="text-violet text-5xl font-bold mt-32 flex items-center justify-center montserrat">RÉSERVATION</h1>

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
                <p class="text-orange font-semibold text-2xl montserrat">Planning du mois de {{$mois}} {{$annee}} </p>
            </div>
            <hr class="flex-grow h-1 bg-orangeClair">
        </div>
        <div class="flex w-full">
            <div class="w-full p-10" id="calendar"></div>
        </div>

        @foreach($me->events as $event)
            <p>{{ $event->lastName }}</p>
        @endforeach



        @include('layouts.footer')


    </body>
</html>

