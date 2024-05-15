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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <a href="#" id="eventLink{{$event->id}}" class="text-lg font-semibold montserrat pt-3 pb-2">
                    {{$event->name}}
                </a>
                <!-- La modal de confirmation de suppression -->
                <div id="deleteEventModal{{$event->id}}" class="fixed inset-0 z-50 overflow-auto bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white p-8 rounded-lg max-w-md">
                        <!-- Contenu de la modal -->
                        <p class="text-lg font-semibold mb-4">Êtes-vous sûr de vouloir supprimer cette formation ?</p>
                        <!-- Bouton pour confirmer la suppression -->
                        <button id="confirmDeleteEvent{{$event->id}}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2">Confirmer</button>
                        <!-- Bouton pour annuler la suppression -->
                        <button id="cancelDeleteEvent{{$event->id}}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Annuler</button>
                    </div>
                </div>

                <!-- Script pour ouvrir la modal -->
                <script>
                    // Récupérer l'élément de lien et la modal par leur ID
                    var eventLink = document.getElementById("eventLink{{$event->id}}");
                    var deleteEventModal = document.getElementById("deleteEventModal{{$event->id}}");

                    // Ajouter un gestionnaire d'événement de clic sur le lien
                    eventLink.addEventListener("click", function(event) {
                        event.preventDefault(); // Pour éviter de suivre le lien
                        deleteEventModal.classList.remove("hidden"); // Afficher la modal
                    });

                    // Ajouter un gestionnaire d'événement de clic sur le bouton de confirmation de suppression
                    var confirmDeleteEvent = document.getElementById("confirmDeleteEvent{{$event->id}}");
                    confirmDeleteEvent.addEventListener("click", function() {
                        // Faire la requête AJAX pour supprimer l'événement
                        // Remplacez `url` par l'URL de votre route pour supprimer l'événement
                        var url = "/deleteEvent/{{$event->id}}"; // Exemple d'URL de suppression
                        $.ajax({
                            url: '/admin/EventCategories/delete',
                            type: 'POST',
                            data: {
                                id:{{$event->id}},
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                // Code à exécuter en cas de succès de la suppression
                                console.log('Service supprimé avec succès');
                                // Vous pouvez ajouter ici le code pour actualiser la liste des éléments si nécessaire
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                // Code à exécuter en cas d'erreur lors de la suppression
                                console.error('Erreur lors de la suppression du service:', error);
                            }
                        })
                    });

                    // Ajouter un gestionnaire d'événement de clic sur le bouton d'annulation de suppression
                    var cancelDeleteEvent = document.getElementById("cancelDeleteEvent{{$event->id}}");
                    cancelDeleteEvent.addEventListener("click", function() {
                        deleteEventModal.classList.add("hidden"); // Cacher la modal lorsque le bouton d'annulation est cliqué
                    });
                </script>
                <div class="w-full">
                    <?php
                    $eventVariations = EventVariation::where('eventCategorie_id', $event->id)->get();
                        ?>
                    @foreach($eventVariations as $eventVariation)
                        <div class="flex">
                            <div class="flex flex-row items-center justify-between py-2 w-5/6 "> <!-- La première div est plus grande -->
                                <p class="montserrat ml-4"> • {{$eventVariation->name}}</p>
                                @if($eventVariation->price==null)
                                    <p class="montserrat ml-4">{{$eventVariation->max_capacity}} personnes</p>
                                @else
                                    <p class="montserrat ml-4"> • {{$eventVariation->price}}€</p>
                                @endif
                            </div>
                            <div class="flex items-center w-1/6 justify-end"> <!-- La deuxième div est plus petite -->
                                <p id="delete{{$eventVariation->id}}">
                                    <i class="fas fa-trash-alt cursor-pointer" id="deleteIcon{{$eventVariation->id}}"></i>
                                </p>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var deleteIcon = document.getElementById('deleteIcon{{$eventVariation->id}}');

                                // Ajout d'un écouteur d'événement pour le clic sur l'icône
                                deleteIcon.addEventListener('click', function() {
                                    id={{$eventVariation->id}};
                                    $.ajax({
                                        url: '/admin/EventVariation/delete',
                                        type: 'POST',
                                        data: {
                                            id:id,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            // Code à exécuter en cas de succès de la suppression
                                            console.log('Élément supprimé avec succès');
                                            // Vous pouvez ajouter ici le code pour actualiser la liste des éléments si nécessaire
                                            location.reload();
                                        },
                                        error: function(xhr, status, error) {
                                            // Code à exécuter en cas d'erreur lors de la suppression
                                            console.error('Erreur lors de la suppression de l\'élément:', error);
                                        }
                                    });
                                });
                            });
                        </script>


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
