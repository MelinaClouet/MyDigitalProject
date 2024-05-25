

@vite(['resources/js/app.js'])


@extends('layouts.base',  ['active' => 'reservation'])

@section('title', 'Calendrier')

@section('content')
    <h1 class="text-violet text-3xl font-bold mt-32 flex items-center justify-center font-poetsen md:text-5xl">RÉSERVATION </h1>

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
            <p class="text-orange font-semibold text-xl  md:text-2xl">Planning du mois de {{$mois}} {{$annee}} </p>
        </div>
        <hr class="flex-grow h-1 bg-orangeClair">
    </div>
    @if($me)
        <div class="flex w-full p-10">
            <div class="w-full " id="calendar"></div>
        </div>
    @else
        <div class="flex w-full p-10">
            <div class="w-full " id="calendarPublic"></div>
        </div>
    @endif

@endsection
