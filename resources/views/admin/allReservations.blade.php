<!DOCTYPE html>
<html lang="en"><head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles



</head>
<?php

use App\Models\Event;
use App\Models\EventCategorie;
use App\Models\EventVariation;

?>

<body class="bg-beige ">

@include ('layouts.headerAdmin')

<div class="flex flex-col items-center justify-center ">
    <div class="w-full py-10 flex flex-col items-center" id="divTitleServices">
        <p class="text-3xl text-violet font-bold"> • • RÉSERVATIONS • •</p>
    </div>

    <div class="flex items-center ">
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
    <div class="w-2/3 mt-3">
        <div class="w-full pl-32" id="calendarAdmin"></div>

    </div>




</div>




</body>
</html>
