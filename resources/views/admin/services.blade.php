<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

    <!-- Ajoutez votre propre fichier CSS pour personnaliser les boutons -->
    <style>
        .dt-button {
            background-color: #FD6D2F !important;
            color: white !important;
            border: 1px solid white !important ;
            border-radius: 10px !important;
        }

    </style>
</head>
<?php
    use App\Models\Event;
    use App\Models\EventCategorie;
    use App\Models\EventVariation;

    $events = Event::all();
    $eventCategories= EventCategorie::where('event_id', '1')->get();
    $eventVariationsAtelier= EventVariation::where('eventCategorie_id', '1')->get();
    $eventsDebat= EventVariation::where('eventCategorie_id', '2')->get();
    $eventConsulationIndividuelle= EventVariation::where('eventCategorie_id', '3')->get();
    $eventCoursParticuliers= EventVariation::where('eventCategorie_id', '4')->get();

?>

<body class="bg-beige ">

@include ('layouts.headerAdmin')

<div class="flex flex-col items-center justify-center ">
    <div class="w-full py-10 flex flex-col items-center" id="divTitleServices">
        <p class="text-3xl text-violet font-bold"> • • SERVICES • •</p>
    </div>

    <div class="w-full flex flex-col items-center justify-center gap-y-5">
        @foreach($eventCategories as $event)
            <div class="bg-orangeClair rounded-2xl w-1/2 flex flex-col px-4" >
                <p class="text-lg font-semibold montserrat pt-3 pb-2">{{$event->name}}</p>
                <div>
                        @if($event->id == 1)
                            @foreach($eventVariationsAtelier as $eventVariation)
                                <div class="flex flex-row items-center justify-between py-3">
                                    <p class="montserrat ml-4"> • Atelier {{$eventVariation->duration}}</p>
                                    <p class=" montserrat">{{$eventVariation->price}} €</p>
                                </div>

                            @endforeach

                            @include ('contents.modal', ['defaultValue' => $event->id])
                        @endif

                        @if($event->id==2)
                            @foreach($eventsDebat as $eventDebat)
                                <div class="flex flex-row items-center justify-between py-2">
                                    <p class="montserrat ml-4"> • {{$eventDebat->name}}</p>
                                    <p class="montserrat">{{$eventDebat->price}}€ </p>
                                </div>

                            @endforeach

                            @include ('contents.modal', ['defaultValue' => $event->id])
                        @endif
                        @if($event->id==3)
                            @foreach($eventConsulationIndividuelle as $eventConsulation)
                                <div class="flex flex-row items-center justify-between py-2">
                                    <p class="montserrat ml-4"> • {{$eventConsulation->name}}</p>
                                    <p class="montserrat">{{$eventConsulation->price}}€</p>
                                </div>
                          @endforeach

                            @include ('contents.modal', ['defaultValue' => $event->id])
                        @endif
                        @if($event->id==4)
                            @foreach($eventCoursParticuliers as $eventCours)
                                <div class="flex flex-row items-center justify-between py-2">
                                    <p class="montserrat ml-4"> • {{$eventCours->name}}</p>
                                    <p class="montserrat">{{$eventCours->price}}€</p>
                                </div>
                            @endforeach
                            @include ('contents.modal', ['defaultValue' => $event->id])
                         @endif

                </div>
            </div>
        @endforeach
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
