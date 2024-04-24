<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

    <!-- Ajoutez votre propre fichier CSS pour personnaliser les boutons -->
    <style>
        .dt-button {
            background-color: #FD6D2F !important;
            color: white !important;
            border: 1px solid white !important;
            border-radius: 10px !important;
        }

    </style>
</head>
<?php

use App\Models\Event;
use App\Models\EventCategorie;
use App\Models\EventVariation;

$events = Event::all();
$eventCategories = EventCategorie::where('event_id', '2')->get();
$eventVariationsAtelier = EventVariation::where('eventCategorie_id', '1')->get();
$eventsDebat = EventVariation::where('eventCategorie_id', '2')->get();
$eventConsulationIndividuelle = EventVariation::where('eventCategorie_id', '3')->get();
$eventCoursParticuliers = EventVariation::where('eventCategorie_id', '4')->get();

?>

<body class="bg-beige ">

@include ('layouts.headerAdmin')

<div class="flex flex-col items-center justify-center ">
    <div class="w-full py-10 flex flex-col items-center" id="divTitleServices">
        <p class="text-3xl text-violet font-bold"> • • FORMATIONS • •</p>
        <p class="text-lg text-orange font-bold">INTERVENTIONS DANS LES ÉTABLISSEMENTS</p>
    </div>

    <div class="w-full flex flex-col items-center justify-center gap-y-5">
        @foreach($eventCategories as $event)
            <div class="bg-orangeClair rounded-2xl w-full md:w-1/2 flex flex-col items-center px-4">
                <p class="text-lg font-semibold montserrat pt-3 pb-2">{{$event->name}}</p>
                <div class="w-full">
                    <?php
                    $eventVariations = EventVariation::where('eventCategorie_id', $event->id)->get();
                        ?>
                    @foreach($eventVariations as $eventVariation)
                        <div class="flex flex-row items-center justify-between py-2">
                            <p class="montserrat ml-4"> • {{$eventVariation->name}}</p>
                            @if($eventVariation->price==null)
                                <p class="montserrat ml-4">{{$eventVariation->max_capacity}} personnes</p>
                            @else
                                <p class="montserrat ml-4"> • {{$eventVariation->price}}€</p>
                            @endif
                        </div>
                    @endforeach
                    <div class="w-full">
                        @include ('contents.modalAddEventVariationFormation', ['defaultValue' => $event->id])
                    </div>

                </div>
            </div>
        @endforeach

        @include('contents.modalAddEventCategorie', ['defaultValue' => '2'])

    </div>
</div>


<script>
    // Inclure le code Alpine.js pour la gestion de l'état de la modal
    document.addEventListener('alpine:init', () => {
        Alpine.data('modal', () => ({
            isOpen: false,
        }));
    });
</script>


</body>
</html>
