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
$eventCategories = EventCategorie::where('event_id', '1')->get();
$eventVariationsAtelier = EventVariation::where('eventCategorie_id', '1')->get();
$eventsDebat = EventVariation::where('eventCategorie_id', '2')->get();
$eventConsulationIndividuelle = EventVariation::where('eventCategorie_id', '3')->get();
$eventCoursParticuliers = EventVariation::where('eventCategorie_id', '4')->get();

?>

<body class="bg-beige ">

@include ('layouts.headerAdmin')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div class="flex flex-col items-center justify-center ">
    <div class="w-full py-10 flex flex-col items-center" id="divTitleServices">
        <p class="text-3xl text-violet font-bold"> • • SERVICES • •</p>
    </div>

    <div class="w-full flex flex-col items-center justify-center gap-y-5">
        @foreach($eventCategories as $event)
            <div class="bg-orangeClair rounded-2xl w-full md:w-1/2 flex flex-col items-center px-4">
                <a href="#" id="deleteServiceLink{{$event->id}}" class="text-lg font-semibold montserrat pt-3 pb-2">
                    {{$event->name}}
                </a>

                <!-- La modal -->
                <!-- La modal de confirmation de suppression -->
                <div id="deleteModal{{$event->id}}" class="fixed inset-0 z-50 overflow-auto bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white p-8 rounded-lg max-w-md">
                        <!-- Contenu de la modal -->
                        <p class="text-lg font-semibold mb-4">Êtes-vous sûr de vouloir supprimer ce service ?</p>
                        <!-- Bouton pour confirmer la suppression -->
                        <button id="confirmDelete{{$event->id}}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2">Confirmer</button>
                        <!-- Bouton pour annuler la suppression -->
                        <button id="cancelDelete{{$event->id}}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Annuler</button>
                    </div>
                </div>


                <script>
                    // Récupérer l'élément de lien et la modal par leur ID
                    var deleteServiceLink = document.getElementById("deleteServiceLink{{$event->id}}");
                    var deleteModal = document.getElementById("deleteModal{{$event->id}}");

                    // Ajouter un gestionnaire d'événement de clic sur le lien
                    deleteServiceLink.addEventListener("click", function(event) {
                        event.preventDefault(); // Pour éviter de suivre le lien
                        deleteModal.classList.remove("hidden"); // Afficher la modal
                    });

                    // Ajouter un gestionnaire d'événement de clic sur le bouton de confirmation de suppression
                    var confirmDelete = document.getElementById("confirmDelete{{$event->id}}");
                    confirmDelete.addEventListener("click", function() {

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

                        deleteModal.classList.add("hidden"); // Cacher la modal
                    });

                    // Ajouter un gestionnaire d'événement de clic sur le bouton d'annulation de suppression
                    var cancelDelete = document.getElementById("cancelDelete{{$event->id}}");
                    cancelDelete.addEventListener("click", function() {
                        deleteModal.classList.add("hidden"); // Cacher la modal lorsque le bouton d'annulation est cliqué
                    });

                </script>

                <div class="w-full">
                        <?php
                        $eventVariations = EventVariation::where('eventCategorie_id', $event->id)->get();
                        ?>
                    @foreach($eventVariations as $eventVariation)
                        <div class="flex">
                            <div class="flex flex-row items-center justify-between py-2 w-4/5 "> <!-- La première div est plus grande -->
                                <p class="montserrat ml-4"> • {{$eventVariation->name}}</p>
                                <p class="montserrat">{{$eventVariation->price}}€</p>
                            </div>

                            <div class="flex items-center w-1/5 justify-end"> <!-- La deuxième div est plus petite -->
                                <p id="delete{{$eventVariation->id}}">
                                    <i class="fas fa-trash-alt cursor-pointer" id="deleteIconEvent{{$eventVariation->id}}"></i>
                                </p>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var deleteIconEvent = document.getElementById('deleteIconEvent{{$eventVariation->id}}');

                                    // Ajout d'un écouteur d'événement pour le clic sur l'icône
                                    deleteIconEvent.addEventListener('click', function() {
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
                        </div>


                    @endforeach
                </div>
                <div class="w-full">
                    @include ('contents.modalAddEventVariation', ['defaultValue' => $event->id])
                </div>
            </div>
        @endforeach
        @include('contents.modalAddEventCategorie', ['defaultValue' => '1'])
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
