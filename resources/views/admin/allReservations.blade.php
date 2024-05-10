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



            <!-- Inclure Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- HTML de la modal -->
        <div x-data="{ isOpen: false }" class="w-1/2" id="modal">
            <!-- Modal -->
            <!-- HTML de la modal -->
            <div x-show="isOpen" @click.away="isOpen = false" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50">
                <div class="bg-white rounded-lg p-8 max-w-md mx-auto">
                    <!-- Contenu de la modal -->
                    <div>
                        <!-- Titre de la modal -->
                        <h2 class="text-2xl font-semibold mb-4 text-orange" id="modalTitle"></h2>

                        <!-- Champs de la modal -->
                        <div class="mt-4 gap-2">
                            <h4 class="text-lg font-semibold mb-4 text-violet">Clients:</h4>

                            <div class="flex flex-row"> <!-- Utilisation de flex pour aligner les éléments horizontalement -->
                                <div class="mr-4"> <!-- Marge à droite pour séparer les éléments -->
                                    <p>Nom: <span  class="font-semibold text-orangeClair" id="modalLastName"></span></p>
                                </div>
                                <div>
                                    <p>Prénom: <span  class="font-semibold text-orangeClair" id="modalFirstName"></span></p>
                                </div>
                            </div>

                            <p>Email: <span  class="font-semibold text-orangeClair" id="modalEmail"></span></p>
                            <p>Téléphone: <span  class="font-semibold text-orangeClair" id="modalPhone"></span></p>
                            <div class="flex flex-row"> <!-- Utilisation de flex pour aligner les éléments horizontalement -->
                                <div class="mr-4"> <!-- Marge à droite pour séparer les éléments -->
                                    <p>Adresse: <span  class="font-semibold text-orangeClair" id="modalAddress"></span></p>
                                </div>
                                <div>
                                    <p>Code Postal: <span  class="font-semibold text-orangeClair" id="modalPostalCode"></span></p>
                                </div>
                            </div>

                            <p>Ville: <span  class="font-semibold text-orangeClair" id="modalCity"></span></p>

                        </div>
                        <div class="mt-4">
                            <h4 class="text-lg font-semibold mb-4 text-violet">Réservation:</h4>
                            <p>Date de début: <span  class="font-semibold text-orangeClair" id="modalStartDate"></span></p>
                            <p>Date de fin: <span  class="font-semibold text-orangeClair" id="modalEndDate"></span></p>
                        </div>

                        <!-- Boutons de la modal -->
                        <div class="flex justify-between">
                            <button @click="isOpen = false" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Inclure Alpine.js pour gérer la logique JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    </div>
</div>

</body>
</html>
